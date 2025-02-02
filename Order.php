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
          
            file_put_contents('order_errors.log', "DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
            return false;
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
  
    
}
?>
