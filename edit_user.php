<?php
require_once "Database.php";
require_once "User.php";

$database = new Database("localhost", "projekti", "root", "");
$userManager = new User($database);

if (!isset($_GET['id'])) {
    echo "Error: No user ID provided.";
    header("refresh:3;url=user_management.php"); 
    exit();
}

$user = $userManager->getUserById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $registration_date = $_POST['registration_date'];

    if ($userManager->updateUser($id, $name, $email, $status, $role, $password, $registration_date)) {
        header("Location: user_management.php");
        exit();
    } else {
        echo "Error updating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/user_management.css">
</head>
<body>
    <h2>Edit User</h2>
    <form method="post" action="edit_user.php?id=<?php echo $user['id']; ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <select name="status">
            <option value="active" <?php echo ($user['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo ($user['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>
        <select name="role">
            <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
        </select>
        <input type="date" name="registration_date" value="<?php echo htmlspecialchars($user['registration_date']); ?>">
        <input type="password" name="password" placeholder="New Password (leave blank if unchanged)">
        <button type="submit" name="updateUser">Update</button>

    </form>
</body>
</html>
