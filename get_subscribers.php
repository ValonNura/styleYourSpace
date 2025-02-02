<?php
require_once 'Database.php';

class GetSubscribers {
    private $db;
    private $connection;

    public function __construct(Database $db) {
        $this->db = $db;
        $this->connection = $this->db->connect();
    }

    public function fetchSubscribers() {
        $query = "SELECT email, DATE_FORMAT(subscribed_at, '%Y-%m-%d %H:%i:%s') as subscribed_at FROM subscribers ORDER BY subscribed_at DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

header('Content-Type: application/json');

$db = new Database('localhost', 'projekti', 'root', 'loni1234');
$getSubscribers = new GetSubscribers($db);
$subscribers = $getSubscribers->fetchSubscribers();
echo json_encode($subscribers);
?>
