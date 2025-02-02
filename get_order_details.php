<?php
require_once 'Database.php';
require_once 'OrderManager.php';
require_once 'OrderController.php';

$db = (new Database('localhost', 'projekti', 'root', ''))->connect();
$orderManager = new OrderManager($db);
$orderController = new OrderController($orderManager);

$order_id = $_GET['id'] ?? null;

if (!$order_id) {
    echo json_encode(['error' => 'Order ID is missing']);
    exit();
}

$order = $orderController->getOrder($order_id);

if (isset($order['error'])) {
    echo json_encode(['error' => $order['error']]);
} else {
    echo json_encode($order);
}