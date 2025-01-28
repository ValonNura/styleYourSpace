<?php

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
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function subscribe($email) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO subscribers (email) VALUES (:email)");
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
        $db = new Database();
        $message = $db->subscribe($email);
        echo "<p>$message</p>";
    } else {
        echo "<p>Invalid email address.</p>";
    }
}
?>
