<?php
require_once 'database.php';

class ProductDetails {
    private $db;

    public function __construct() {
        $database = new Database('localhost', 'projekti', 'root', 'loni1234');
        $this->db = $database->connect();
    }

    public function getProductDetails($productId) {
        try {
            $sql = "SELECT p.*, d.description, d.stock
                FROM products p
                LEFT JOIN product_details d ON p.id = d.product_id
                WHERE p.id = :id";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$product) return null;
    
       
            $product['stock'] = isset($product['stock']) ? $product['stock'] : 0;
    
            return $product;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getRelatedProducts($category, $excludeId) {
        try {
            $sql = "SELECT id, name, price, old_price, image_default 
                    FROM products 
                    WHERE category = :category AND id != :excludeId 
                    ORDER BY RAND() LIMIT 4";
                    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':excludeId', $excludeId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    
}
