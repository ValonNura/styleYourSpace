<?php
require_once 'database.php';

class Product {
    private $db;

    public function __construct() {
        $database = new Database('localhost', 'projekti', 'root', '');
        $this->db = $database->connect();
    }

    public function getProducts($category = 'all', $sort = '') {
        try {
            $sql = "SELECT * FROM products";
            
            if ($category !== 'all') {
                $sql .= " WHERE category = :category";
            }

            if ($sort === 'price_asc') {
                $sql .= " ORDER BY price ASC";
            } elseif ($sort === 'price_desc') {
                $sql .= " ORDER BY price DESC";
            }

            $stmt = $this->db->prepare($sql);

            if ($category !== 'all') {
                $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
