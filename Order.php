<?php
class Order {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function placeOrder($orderData) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO orders 
                (product_id, product_name, product_image, quantity, zip_code, shipping_method, price_per_unit, total_price, customer_name, email, telephone, address, city, payment_method, comments)
                VALUES 
                (:product_id, :product_name, :product_image, :quantity, :zip_code, :shipping_method, :price_per_unit, :total_price, :customer_name, :email, :telephone, :address, :city, :payment_method, :comments)
            ");
            return $stmt->execute($orderData);
        } catch (PDOException $e) {
            return "Error placing order: " . $e->getMessage();
        }
    }
    
    public function getAllOrders() {
        try {
            $stmt = $this->db->query("
                SELECT id, product_name, product_image, customer_name, quantity, total_price, order_date, comments 
                FROM orders 
                ORDER BY order_date DESC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
  
    public function fetchProduct($productId) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
}
?>
