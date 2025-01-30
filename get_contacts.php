<?php
require_once 'Database.php';

class GetContacts {
    private $db;
    private $connection;

    public function __construct(Database $db) {
        $this->db = $db;
        $this->connection = $this->db->connect();
    }

    public function fetchContacts() {
        $query = "SELECT name, email, message, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') as created_at FROM contacts ORDER BY created_at DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

header('Content-Type: application/json');

$db = new Database('localhost', 'projekti', 'root', '');
$getContacts = new GetContacts($db);
$contacts = $getContacts->fetchContacts();
echo json_encode($contacts);
?>
