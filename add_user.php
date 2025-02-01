<?php
require_once "Database.php";
require_once "User.php";

$database = new Database("localhost", "projekti", "root", "loni1234");
$userManager = new User($database);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    if ($userManager->createUser($name, $email, $status, $role, $password)) {
        header("Location: user_management.php");
        exit();
    } else {
        echo "Gabim gjatë shtimit të përdoruesit.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="css/user_management.css">
</head>
<body>
    <div class="container">
        <h2>Add New User</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Create User</button>
        </form>
        <a href="user_management.php">Back to User Management</a>
    </div>
</body>
</html>
