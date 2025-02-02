<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php"); 
    exit();
}

require_once 'Database.php';
require_once 'OrderManager.php';
require_once 'OrderController.php';

$db = (new Database('localhost', 'projekti', 'root', ''))->connect();
$orderManager = new OrderManager($db);
$orderController = new OrderController($orderManager);

$search = $_GET['search'] ?? '';
$status = $_GET['status'] ?? 'all';
$date = $_GET['date'] ?? '';

$orders = $orderController->filterOrders($search, $status, $date);
if (isset($orders['error'])) {
    die("Error fetching orders: " . $orders['error']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="products.php"><i class="fas fa-couch"></i> Furniture</a></li>
            <li><a href="orders.php" class="active"><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="profile.php"><i class="fas fa-user-cog"></i> Account Settings</a></li>
            <li><a href="add_product.php"><i class="fas fa-plus"></i>  New Product</a></li>
            <li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="user_management.php"><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="home.php" target="_blank"><i class="fas fa-home"></i> View Website</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Orders Management</h1>
            <div class="profile">
                <a href="profile.php" class="profile-btn">
                    <img src="img/pfp.jpg" alt="Profile" class="profile-img">
                    <span>Your Profile</span>
                </a>
                <button onclick="window.location.href='logout.php'" class="logout-btn">Logout</button>
            </div>
        </header>

        <section class="filters">
    <form method="GET" action="orders.php" class="filters-container">
        <input type="text" name="search" class="search-bar" placeholder="Customer name or order ID" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">

        <select name="status" class="status-filter">
            <option value="all" <?php if(($_GET['status'] ?? '') === 'all') echo 'selected'; ?>>All statuses</option>
            <option value="shipped" <?php if(($_GET['status'] ?? '') === 'shipped') echo 'selected'; ?>>Shipped</option>
            <option value="pending" <?php if(($_GET['status'] ?? '') === 'pending') echo 'selected'; ?>>Pending</option>
            <option value="processing" <?php if(($_GET['status'] ?? '') === 'processing') echo 'selected'; ?>>Processing</option>
            <option value="canceled" <?php if(($_GET['status'] ?? '') === 'canceled') echo 'selected'; ?>>Canceled</option>
        </select>

        <div class="date-filter-container">
            <label for="order-date" class="date-label"></label>
            <input type="date" name="date" id="order-date" class="date-filter" value="<?php echo htmlspecialchars($_GET['date'] ?? ''); ?>">
        </div>

        <button type="submit" class="filter-btn">Search</button>
    </form>
</section>

        <section>
            <h2>Orders Overview</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Items</th>
                        <th>Order Date</th>
                        <th>Shipping Method</th>
                        <th>Total ($)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>#<?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['email']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_name']); ?> (<?php echo htmlspecialchars($order['quantity']); ?>)</td>
                            <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                            <td><?php echo htmlspecialchars($order['shipping_method']); ?></td>
                            <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                            <td class="action-buttons">
                              <button class="edit-btn" onclick="showEdit('<?php echo htmlspecialchars($order['id']); ?>')">Edit</button>
                              <button class="details-btn" onclick="showDetails('<?php echo htmlspecialchars($order['id']); ?>')">Details</button>
                              <button class="delete-btn" onclick="deleteOrder('<?php echo htmlspecialchars($order['id']); ?>')">Delete</button>
</td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>


        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>Edit Order</h2>
                <form id="editForm">
                    <input type="hidden" id="orderId">
                    <label for="customerName">Customer Name:</label>
                    <input type="text" id="customerName" readonly>
                    <label for="status">Status:</label>
                    <select id="status">
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Canceled">Canceled</option>
                    </select>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" min="1">
                    <button type="submit" class="edit-btn">Save</button>
                </form>
            </div>
        </div>

    
        <div id="detailsModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeDetailsModal()">&times;</span>
                <h2>Order Details</h2>
                <p><strong>Order ID:</strong> <span id="detailOrderId"></span></p>
                <p><strong>Customer:</strong> <span id="detailCustomerName"></span></p>
                <p><strong>Product:</strong> <span id="detailProductName"></span></p>
                <p><strong>Quantity:</strong> <span id="detailQuantity"></span></p>
                <p><strong>Total Price:</strong> <span id="detailTotalPrice"></span></p>
                <p><strong>Shipping Method:</strong> <span id="detailShippingMethod"></span></p>
                <p><strong>Order Date:</strong> <span id="detailOrderDate"></span></p>
            </div>
        </div>
    </div>

    <script>
    function showEdit(orderId) {
        fetch('get_order_details.php?id=' + orderId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('orderId').value = data.id;
                document.getElementById('customerName').value = data.customer_name;
                document.getElementById('status').value = data.shipping_method;
                document.getElementById('quantity').value = data.quantity;
                document.getElementById('editModal').style.display = 'flex';
            })
            .catch(error => console.error('Error:', error));
    }

    function showDetails(orderId) {
        fetch('get_order_details.php?id=' + orderId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('detailOrderId').textContent = data.id;
                document.getElementById('detailCustomerName').textContent = data.customer_name;
                document.getElementById('detailProductName').textContent = data.product_name;
                document.getElementById('detailQuantity').textContent = data.quantity;
                document.getElementById('detailTotalPrice').textContent = data.total_price;
                document.getElementById('detailShippingMethod').textContent = data.shipping_method;
                document.getElementById('detailOrderDate').textContent = data.order_date;
                document.getElementById('detailsModal').style.display = 'flex';
            })
            .catch(error => console.error('Error:', error));
    }
     
    function deleteOrder(orderId) {
    if (confirm("Are you sure you want to delete this order?")) {
        fetch('delete_order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: orderId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order deleted successfully!');
                location.reload();  
            } else {
                alert('Failed to delete order.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}


    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function closeDetailsModal() {
        document.getElementById('detailsModal').style.display = 'none';
    }

    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const orderId = document.getElementById('orderId').value;
        const status = document.getElementById('status').value;
        const quantity = document.getElementById('quantity').value;

        fetch('update_order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: orderId, status: status, quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order updated successfully!');
                closeEditModal();
                location.reload();
            } else {
                alert('Failed to update order.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
    </script>
</body>
</html>
