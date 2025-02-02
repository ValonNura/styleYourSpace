<?php
session_start();

require_once 'database.php';
require_once 'Order.php';
require_once 'Product.php';

class CheckoutController {
    private $db;
    private $order;
    private $product;

    public function __construct($db) {
        $this->db = $db;
        $this->order = new Order($this->db);
        $this->product = new Product($this->db);
    }

    public function handleRequest() {
        $productId = $_GET['product_id'] ?? $_GET['id'] ?? null;
        $zipCode = $_GET['zipcode'] ?? '';
        $quantity = $_GET['quantity'] ?? 1;

        if (!$productId) {
            $this->renderError("Invalid Product. Product ID not received.");
            return;
        }

        $product = $this->product->fetchProduct($productId);
        if (!$product) {
            $this->renderError("Product not found.");
            return;
        }

        $this->renderCheckoutPage($product, $zipCode, $quantity);
    }

    private function renderError($message) {
        echo "<h1>Error</h1><p>$message</p>";
        exit;
    }

    private function renderCheckoutPage($product, $zipCode, $quantity) {
        include 'checkout_view.php';
    }
}

$db = (new Database('localhost', 'projekti', 'root', ''))->connect();
$checkout = new CheckoutController($db);
$checkout->handleRequest();
?>
