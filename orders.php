<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management </title>
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#furniture"><i class="fas fa-couch"></i> Furniture</a></li>
            <li><a href="orders.php" class="active"><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="profile.php"><i class="fas fa-user-cog"></i> Account Settings</a></li>
            <li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a></li>
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
            <div class="filters-container">
            <input type="text" class="search-bar" placeholder="Customer name or order ID">
        
        <select class="status-filter">
            <option value="all">All statuses</option>
            <option value="shipped">Shipped</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="canceled">Canceled</option>
        </select>
        
        <div class="date-filter-container">
            <label for="order-date" class="date-label">From Date:</label>
            <input type="date" id="order-date" class="date-filter">
        </div>
        
        <button class="filter-btn">Search</button>
    </div>
</section>

        <section class="stats">
            <div class="stat-card">
                <h3>Total Orders</h3>
                <p>125</p>
            </div>
            <div class="stat-card">
                <h3>Total Revenue</h3>
                <p>$24,580</p>
            </div>
            <div class="stat-card">
                <h3>Pending Orders</h3>
                <p>15</p>
            </div>
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
                        <th>Status</th>
                        <th>Total ($)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>David James</td>
                        <td>david.james@gmail.com</td>
                        <td>Sofa, Coffee Table</td>
                        <td>2025-01-05</td>
                        <td>Shipped</td>
                        <td>470</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="details-btn" onclick="showDetails('#001')">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>Jane Smith</td>
                        <td>jane.smith@hotmail.com</td>
                        <td>Chair, Lamp</td>
                        <td>2025-01-06</td>
                        <td>Pending</td>
                        <td>200</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="details-btn" onclick="showDetails('#002')">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>John Doe</td>
                        <td>john.doe@yandex.com</td>
                        <td>Desk, Chair</td>
                        <td>2025-01-07</td>
                        <td>Processing</td>
                        <td>300</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="details-btn" onclick="showDetails('#003')">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#004</td>
                        <td>Emily Davis</td>
                        <td>emily.davis@hotmail.com</td>
                        <td>Couch, Coffee Table</td>
                        <td>2025-01-08</td>
                        <td>Canceled</td>
                        <td>150</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="details-btn" onclick="showDetails('#004')">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#005</td>
                        <td>Michael Brown</td>
                        <td>michael.brown@gmail.com</td>
                        <td>Dining Table, Chairs</td>
                        <td>2025-01-09</td>
                        <td>Shipped</td>
                        <td>800</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="details-btn" onclick="showDetails('#005')">Details</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>

        <!-- Modal for Order Details -->
        <div class="modal" id="order-details">
            <div class="modal-content">
                <span class="close-btn" onclick="closeDetails()">&times;</span>
                <h3>Order Details</h3>
                <p><strong>Order ID:</strong> <span id="order-id"></span></p>
                <p><strong>Customer:</strong> <span id="customer-name"></span></p>
                <p><strong>Items:</strong> <span id="order-items"></span></p>
                <p><strong>Total:</strong> <span id="order-total"></span></p>
            </div>
        </div>
    </div>

    <script>function showDetails(orderId) {
        const modal = document.getElementById('order-details');
        const orderData = {
    '#001': {
        id: '#001',
        customer: 'David James',
        items: 'Sofa, Coffee Table',
        total: '$470'
    },
    '#002': {
        id: '#002',
        customer: 'Jane Smith',
        items: 'Chair, Lamp',
        total: '$200'
    },
    '#003': {
        id: '#003',
        customer: 'John Doe',
        items: 'Desk, Chair',
        total: '$300'
    },
    '#004': {
        id: '#004',
        customer: 'Emily Davis',
        items: 'Couch, Coffee Table',
        total: '$150'
    },
    '#005': {
        id: '#005',
        customer: 'Michael Brown',
        items: 'Dining Table, Chairs',
        total: '$800'
    }
};

    
        const order = orderData[orderId];
        document.getElementById('order-id').textContent = order.id;
        document.getElementById('customer-name').textContent = order.customer;
        document.getElementById('order-items').textContent = order.items;
        document.getElementById('order-total').textContent = order.total;
    
        modal.style.display = 'flex'; 
    }
    
    function closeDetails() {
        document.getElementById('order-details').style.display = 'none';
    }
    
    </script>
</body>
</html>
