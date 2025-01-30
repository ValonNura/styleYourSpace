<?php
require_once 'database.php';

class User {
    private $connection;

    public function __construct($db) {
        $this->connection = $db;
    }

    public function getTotalUsers() {
        $query = $this->connection->prepare("SELECT COUNT(*) AS total_users FROM users");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['total_users'];
    }
}

class ContactMessage {
    private $connection;

    public function __construct($db) {
        $this->connection = $db;
    }

    public function getRecentMessages($limit = 3) {
        $query = $this->connection->prepare("SELECT * FROM contacts ORDER BY created_at DESC LIMIT :limit");
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteMessage($messageId) {
        $deleteQuery = $this->connection->prepare("DELETE FROM contacts WHERE id = :id");
        $deleteQuery->bindParam(':id', $messageId, PDO::PARAM_INT);
        return $deleteQuery->execute();
    }
}
?>
