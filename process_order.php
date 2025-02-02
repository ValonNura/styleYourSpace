<?php
session_start();
require_once 'database.php';
require_once 'Order.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Database('localhost', 'projekti', 'root', ''))->connect();
    $order = new Order($db);

    $orderData = [
        ':product_id'      => $_POST['product_id'],
        ':product_name'    => $_POST['product_name'],
        ':product_image'   => $_POST['product_image'],
        ':quantity'        => $_POST['quantity'],
        ':zip_code'        => $_POST['zip_code'],
        ':shipping_method' => $_POST['shipping_method'],
        ':price_per_unit'  => $_POST['price_per_unit'],
        ':total_price'     => $_POST['total_price'],
        ':customer_name'   => $_POST['first_name'] . ' ' . $_POST['last_name'],
        ':email'           => $_POST['email'],
        ':telephone'       => $_POST['telephone'],
        ':address'         => $_POST['address'],
        ':city'            => $_POST['city'],
        ':payment_method'  => $_POST['payment_method'],
        ':comments'        => $_POST['comments'] ?? ''  
    ];

    if ($order->placeOrder($orderData)) {
        echo json_encode(['success' => true, 'message' => 'Order placed successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to place the order.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
