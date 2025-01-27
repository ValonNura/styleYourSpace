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

    public function insertUser($name, $email, $password) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                return "Email already exists.";
            }

            $stmt->close();

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                return "Registration successful!";
            } else {
                return "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            return "Please enter a valid email.";
        }
    }

    public function close() {
        $this->conn->close();
    }
}

class SignupForm {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['signupName'], $_POST['signupEmail'], $_POST['signupPassword'], $_POST['signupConfirmPassword'])) {
                $name = $_POST['signupName'];
                $email = $_POST['signupEmail'];
                $password = $_POST['signupPassword'];
                $confirmPassword = $_POST['signupConfirmPassword'];

                if ($password !== $confirmPassword) {
                    echo "Passwords do not match.";
                    return;
                }

                echo $this->db->insertUser($name, $email, $password);
            } else {
                echo "All fields are required.";
            }
        }
    }

    public function __destruct() {
        $this->db->close();
    }
}

$form = new SignupForm();
$form->handleFormSubmission();
?>
