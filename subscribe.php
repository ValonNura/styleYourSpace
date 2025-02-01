<?php
require_once 'database.php';

class Subscriber {
    private $connection;

    public function __construct($db) {
        $this->connection = $db;
    }

    public function subscribe($email) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO subscribers (email) VALUES (:email)");
            $stmt->bindParam(':email', $email);
            if ($stmt->execute()) {
                $this->addNotification($email);
                return "Thank you for subscribing!";
            } else {
                return "There was an error. Please try again.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    private function addNotification($email) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO notifications (user_id, message, status) VALUES (1, :message, 'unread')");
            $message = "New subscriber: " . $email;
            $stmt->bindParam(':message', $message);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Failed to insert notification: " . $e->getMessage());
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $db = new Database('localhost', 'projekti', 'root', '');
        $connection = $db->connect();
        $subscriber = new Subscriber($connection);
        echo $subscriber->subscribe($email);
    } else {
        echo "Invalid email address.";
    }
}
?>
