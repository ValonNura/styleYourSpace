<?php
class OrderAnalytics {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRevenueData() {
        $query = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(total_price) AS total_revenue 
                  FROM orders 
                  WHERE shipping_method != 'Canceled' 
                  GROUP BY month 
                  ORDER BY month ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $revenueData = [];
        foreach ($result as $row) {
            $revenueData['months'][] = $row['month'];
            $revenueData['revenues'][] = (float)$row['total_revenue'];
        }

        return $revenueData;
    }

    public function getUserGrowthData() {
        $query = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS total_users 
                  FROM users 
                  GROUP BY month 
                  ORDER BY month ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderPerformance() {
        $query = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, COUNT(*) AS total_orders, 
                         SUM(total_price) AS total_revenue 
                  FROM orders 
                  GROUP BY month 
                  ORDER BY month ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $orderPerformance = [];

        foreach ($result as $row) {
            $orderPerformance['months'][] = $row['month'];
            $orderPerformance['total_orders'][] = (int)$row['total_orders'];
            $orderPerformance['total_revenue'][] = (float)$row['total_revenue'];
        }

        return $orderPerformance;
    }
}
?>
