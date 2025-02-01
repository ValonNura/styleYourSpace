<?php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "projekti";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insertContact($name, $email, $message) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           
            $stmt = $this->conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $message); 

            if ($stmt->execute()) {
              
                $this->addNotification($name, $email);
                return "Your message has been sent successfully!";
            } else {
                return "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            return "Please enter a valid email.";
        }
    }

    private function addNotification($name, $email) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, message, status) VALUES (1, ?, 'unread')");
            $message = "New contact message from $name ($email)";
            $stmt->bind_param("s", $message);
            $stmt->execute();
        } catch (Exception $e) {
            error_log("Failed to insert notification: " . $e->getMessage());
        }
    }

    public function close() {
        $this->conn->close();
    }
}

class ContactForm {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                echo $this->db->insertContact($name, $email, $message);
            } else {
                echo "All fields are required.";
            }
        }
    }

    public function __destruct() {
        $this->db->close();
    }
}

$form = new ContactForm();
$form->handleFormSubmission();

?>
