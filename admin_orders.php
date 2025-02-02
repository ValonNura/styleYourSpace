<?php
session_start();
require_once 'database.php';
require_once 'Order.php';

try {
    $db = new Database('localhost', 'projekti', 'root', '');
    $conn = $db->connect();

    
    $orderHandler = new Order($conn);
    $orders = $orderHandler->getAllOrders();

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="css/product_details.css">
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>All Orders</h1>
    <?php if (!empty($orders)): ?>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Comments</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['id']) ?></td>
                    <td><?= htmlspecialchars($order['product_name']) ?></td>
                    <td><?= htmlspecialchars($order['customer_name']) ?></td>
                    <td><?= htmlspecialchars($order['quantity']) ?></td>
                    <td>$<?= number_format($order['total_price'], 2) ?></td>
                    <td><?= htmlspecialchars($order['order_date']) ?></td>
                    <td><?= htmlspecialchars($order['comments'] ?? 'No comments') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p style="text-align:center;">No orders found.</p>
    <?php endif; ?>
</body>
</html>