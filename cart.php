<?php
if (!class_exists('Cart')) {
    class Cart {
        public function __construct() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
        }

        public function addProduct($product) {
            $productId = $product['id'];
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] += $product['quantity'];
            } else {
                $_SESSION['cart'][$productId] = $product;
            }
        }

        public function getProducts() {
            return $_SESSION['cart'];
        }

        public function clearCart() {
            $_SESSION['cart'] = [];
        }

        public function removeProduct($productId) {
            if (isset($_SESSION['cart'][$productId])) {
                unset($_SESSION['cart'][$productId]);
            }
        }
    }
}
?>
