<?php
require_once 'Database.php'; 

session_start(); 

$db = new Database('localhost', 'projektifinal', 'root', 'loni1234');
$connection = $db->connect();

if (!$connection) {
    die("Database connection failed.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['signupName'];
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $confirmPassword = $_POST['signupConfirmPassword'];

    if ($password !== $confirmPassword) {
        echo "<script>document.getElementById('signupError').innerText = 'Passwords do not match';</script>";
        exit();
    }

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "<script>document.getElementById('signupError').innerText = 'Email already exists';</script>";
        exit();
    }

    // Prepare and execute the SQL statement
    $stmt = $connection->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>document.getElementById('signupError').innerText = 'Registration failed: " . implode(", ", $stmt->errorInfo()) . "';</script>";
    }
}
?>