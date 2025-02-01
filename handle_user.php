<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "Database.php";
require_once "User.php";

$database = new Database("localhost", "projekti", "root", "");
$userManager = new User($database);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    if (isset($_POST['deleteUser'])) {
        $userId = $_POST['deleteUser'];

        if ($userManager->deleteUser($userId)) {
            header("Location: user_management.php");
            exit();
        } else {
            echo " Error deleting user.";
        }
    }

    
    if (isset($_POST['createUser'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $role = $_POST['role'];
        $password = $_POST['password'];

        if ($userManager->createUser($name, $email, $status, $role, $password)) {
            header("Location: user_management.php");
            exit();
        } else {
            echo " Error creating user.";
        }
    }

    
    if (isset($_POST['updateUser'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $registration_date = $_POST['registration_date'];

        if (empty($password)) {
            $success = $userManager->updateUser($id, $name, $email, $status, $role, "", $registration_date);
        } else {
            $success = $userManager->updateUser($id, $name, $email, $status, $role, $password, $registration_date);
        }

        if ($success) {
            header("Location: user_management.php");
            exit();
        } else {
            echo " Error updating user.";
        }
    }
}
?>
