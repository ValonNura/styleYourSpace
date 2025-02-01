<?php
header('Content-Type: application/json');

class Database {
    private $servername = "localhost"; 
    private $username = "root"; 
    private $password = ""; 
    private $dbname = "projekti";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }

    public function getSubscriberGrowth() {
        try {
            $stmt = $this->conn->prepare("
                SELECT DATE_FORMAT(subscribed_at, '%Y-%m') AS month, COUNT(*) AS total
                FROM subscribers
                GROUP BY month
                ORDER BY month
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }
}

$db = new Database();
$data = $db->getSubscriberGrowth();
echo json_encode($data);
?>
