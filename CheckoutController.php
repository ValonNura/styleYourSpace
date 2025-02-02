<?php
session_start();

require_once 'database.php';
require_once 'Order.php';
require_once 'Product.php';
require_once 'Cart.php';
require_once 'Customer.php';

class CheckoutController {
    private $db;
    private $order;
    private $product;
    private $cart;

    public function __construct($db) {
        $this->db = $db;
        $this->order = new Order($this->db);
        $this->product = new Product($this->db);
        $this->cart = new Cart();
    }

    public function processOrder($postData) {
        $customer = new Customer($postData);  
        if (!$customer->isValid()) {
            echo json_encode(['success' => false, 'errors' => $customer->getErrors()]);
            return;
        }

        $products = $this->cart->getProducts();  
        $orderSuccess = true;

        foreach ($products as $product) {
            $orderData = [
                ':product_id'      => $product['id'],
                ':product_name'    => $product['name'],
                ':product_image'   => $product['image'],
                ':quantity'        => $product['quantity'],
                ':zip_code'        => $postData['zip_code'],
                ':shipping_method' => $postData['shipping_method'],
                ':price_per_unit'  => $product['price'],
                ':total_price'     => $product['price'] * $product['quantity'],
                ':customer_name'   => $customer->getFirstName() . ' ' . $customer->getLastName(),
                ':email'           => $customer->getEmail(),
                ':telephone'       => $customer->getTelephone(),
                ':address'         => $customer->getAddress(),
                ':city'            => $customer->getCity(),
                ':payment_method'  => $postData['payment_method'],
                ':comments'        => $customer->getComments()
            ];

            if (!$this->order->placeOrder($orderData)) {
                $orderSuccess = false;
                break;
            }
        }

        if ($orderSuccess) {
            $this->cart->clearCart();
            echo json_encode(['success' => true, 'message' => 'Order placed successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to place one or more orders.']);
        }
    }

    public function handleRequest() {
        $productId = $_GET['product_id'] ?? $_GET['id'] ?? null;
        $zipCode = $_GET['zipcode'] ?? '';
        $quantity = $_GET['quantity'] ?? 1;

        if ($productId) {
            $product = $this->product->fetchProduct($productId);
            if (!$product) {
                $this->renderError("Product not found.");
                return;
            }
            $this->renderCheckoutPage([$product]);
        } else {
            $products = $this->cart->getProducts();
            if (empty($products)) {
                $this->renderError("Your cart is empty.");
                return;
            }
            $this->renderCheckoutPage($products);
        }
    }

    private function renderError($message) {
        echo "<h1>Error</h1><p>$message</p>";
        exit;
    }

    private function renderCheckoutPage($products) {
        include 'checkout_view.php';
    }
}

$db = (new Database('localhost', 'projekti', 'root', ''))->connect();
$checkout = new CheckoutController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $checkout->processOrder($_POST);  
} else {
    $checkout->handleRequest();  
}
