<?php
class DashboardManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTotalUsers() {
        $query = "SELECT COUNT(*) as total FROM users";
        return $this->executeQuery($query);
    }

    public function getTotalOrders() {
        $query = "SELECT COUNT(*) as total FROM orders";
        return $this->executeQuery($query);
    }

    public function getTotalRevenue() {
        $query = "SELECT SUM(total_price) as total FROM orders";
        return $this->executeQuery($query);
    }

    public function getBestSellingProducts() {
        $query = "SELECT COUNT(*) as total FROM products WHERE is_best_seller = 1";
        return $this->executeQuery($query);
    }

    public function getRecentOrders() {
        $query = "SELECT * FROM orders ORDER BY order_date DESC LIMIT 5";
        return $this->fetchResults($query);
    }

    public function getRecentContacts() {
        $query = "SELECT * FROM contacts ORDER BY created_at DESC LIMIT 5";
        return $this->fetchResults($query);
    }

    private function executeQuery($query) {
        $stmt = $this->db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    private function fetchResults($query) {
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
