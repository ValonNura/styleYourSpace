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
                return "Thank you for subscribing!";
            } else {
                return "There was an error. Please try again.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $db = new Database('localhost', 'projekti', 'root', 'loni1234');
        $connection = $db->connect();
        $subscriber = new Subscriber($connection);
        $message = $subscriber->subscribe($email);
        echo "<p>$message</p>";
    } else {
        echo "<p>Invalid email address.</p>";
    }
}
?>
