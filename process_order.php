<?php
session_start();
require_once 'database.php';
require_once 'Order.php';
require_once 'Cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Database('localhost', 'projekti', 'root', ''))->connect();
    $orderHandler = new Order($db);
    $cart = new Cart();

    
    $customerName = $_POST['first_name'] . ' ' . $_POST['last_name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipCode = $_POST['zip_code'];
    $country = $_POST['country'];
    $shippingMethod = $_POST['shipping_method'];
    $paymentMethod = $_POST['payment_method'];
    $comments = $_POST['comments'] ?? '';


    $products = $_POST['products'];
    $orderSuccess = true;

    foreach ($products as $product) {
        $orderData = [
            ':product_id'      => $product['id'],
            ':product_name'    => $product['name'],
            ':product_image'   => $product['image'],  
            ':quantity'        => $product['quantity'],
            ':zip_code'        => $zipCode,
            ':shipping_method' => $shippingMethod,
            ':price_per_unit'  => $product['price'],
            ':total_price'     => $product['price'] * $product['quantity'],
            ':customer_name'   => $customerName,
            ':email'           => $email,
            ':telephone'       => $telephone,
            ':address'         => $address,
            ':city'            => $city,
            ':payment_method'  => $paymentMethod,
            ':comments'        => $comments
        ];

        if (!$orderHandler->placeOrder($orderData)) {
            $orderSuccess = false;
            break;  
        }
    }

    if ($orderSuccess) {
        $cart->clearCart();  
        echo json_encode(['success' => true, 'message' => 'Order placed successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to place one or more orders.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
