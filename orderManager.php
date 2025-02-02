<?php
class OrderManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllOrders() {
        $query = "SELECT * FROM orders ORDER BY order_date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($orderId) {
        $query = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateOrder($orderId, $status, $quantity) {
        $query = "UPDATE orders SET shipping_method = ?, quantity = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$status, $quantity, $orderId]);
    }

    public function deleteOrder($orderId) {
        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$orderId]);
    }

    public function filterOrders($search, $status, $date) {
        $query = "SELECT * FROM orders WHERE 1=1";
        $params = [];
    
        if (!empty($search)) {
            $query .= " AND (customer_name LIKE :search OR id LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }
    
        if ($status !== 'all') {
            $query .= " AND shipping_method = :status";
            $params[':status'] = ucfirst($status);
        }
    
        if (!empty($date)) {
            $query .= " AND DATE(order_date) >= :date";
            $params[':date'] = $date;
        }
    
        $query .= " ORDER BY order_date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}


?>
