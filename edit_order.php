<?php
session_start();
require_once 'database.php';
require_once 'OrderManager.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php"); 
    exit();
}

$db = (new Database('localhost', 'projekti', 'root', ''))->connect();
$orderManager = new OrderManager($db);

$order_id = $_GET['id'] ?? null;

if (!$order_id) {
    die("Order ID not provided.");
}

$order = $orderManager->getOrderById($order_id);

if (!$order) {
    die("Order not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_status = $_POST['status'];
    $new_quantity = $_POST['quantity'];

    if ($orderManager->updateOrder($order_id, $new_status, $new_quantity)) {
        header("Location: orders.php");
        exit();
    } else {
        echo "Failed to update order.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
    <link rel="stylesheet" href="css/orders.css">
</head>
<body>
    <div class="main-content">
        <h1>Edit Order #<?php echo htmlspecialchars($order['id']); ?></h1>
        <form method="POST">
            <label>Customer Name:</label>
            <input type="text" value="<?php echo htmlspecialchars($order['customer_name']); ?>" readonly>

            <label>Status:</label>
            <select name="status" required>
                <option value="Pending" <?php if($order['shipping_method'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Processing" <?php if($order['shipping_method'] == 'Processing') echo 'selected'; ?>>Processing</option>
                <option value="Shipped" <?php if($order['shipping_method'] == 'Shipped') echo 'selected'; ?>>Shipped</option>
                <option value="Canceled" <?php if($order['shipping_method'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
            </select>

            <label>Quantity:</label>
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($order['quantity']); ?>" min="1" required>

            <button type="submit" class="edit-btn">Save Changes</button>
            <a href="orders.php" class="delete-btn">Cancel</a>
        </form>
    </div>
</body>
</html>
