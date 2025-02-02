<?php
session_start();
$cartData = json_decode(file_get_contents("php://input"), true);

if ($cartData) {
    $_SESSION['cart'] = [];
    foreach ($cartData as $item) {
        $_SESSION['cart'][$item['id']] = $item;
    }
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'No cart data received.']);
}
?>
