<?php
class performanceAnalytics {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getRevenueData() {
       
        return [1000, 2000, 1500, 3000, 2500, 4000];
    }

    public function getUserGrowthData() {
       
        $query = $this->connection->prepare("
            SELECT 
                YEAR(subscribed_at) AS year,
                MONTH(subscribed_at) AS month,
                COUNT(*) AS total
            FROM subscribers
            GROUP BY YEAR(subscribed_at), MONTH(subscribed_at)
            ORDER BY year DESC, month DESC
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
