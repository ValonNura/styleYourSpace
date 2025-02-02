<?php
require_once 'Database.php';
require_once 'OrderManager.php';
require_once 'OrderController.php';

$db = (new Database('localhost', 'projekti', 'root', 'loni1234'))->connect();
$orderManager = new OrderManager($db);
$orderController = new OrderController($orderManager);

$data = json_decode(file_get_contents('php://input'), true);

$order_id = $data['id'] ?? null;
$status = $data['status'] ?? null;
$quantity = $data['quantity'] ?? null;

if (!$order_id || !$status || !$quantity) {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
    exit();
}

if ($orderController->updateOrder($order_id, $status, $quantity)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update order']);
}
