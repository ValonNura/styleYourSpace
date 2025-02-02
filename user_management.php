<?php

session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php"); 
    exit();
}


header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache");
header("Expires: 0");

require_once "Database.php";
require_once "User.php";

class UserManagementApp {
    private $userManager;

    public function __construct() {
        $database = new Database("localhost", "projekti", "root", "");
        $this->userManager = new User($database);
    }

    public function getUsers() {
        return $this->userManager->getAllUsers();
    }
}

$app = new UserManagementApp();
$users = $app->getUsers();

function getTotalActiveUsers($db) {
    $query = "SELECT COUNT(*) as total FROM users WHERE status = 'active'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="css/user_management.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function openEditPopup(id, name, email, status, role, registration_date) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-status').value = status;
            document.getElementById('edit-role').value = role;
            document.getElementById('edit-registration_date').value = registration_date;
            document.getElementById('edit-popup').style.display = 'flex';
        }

        function openAddPopup() {
            document.getElementById('add-popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('edit-popup').style.display = 'none';
            document.getElementById('add-popup').style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="products.php"><i class="fas fa-couch"></i> Furniture</a></li>
            <li><a href="orders.php"><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="profile.php"><i class="fas fa-user-cog"></i> Account Settings</a></li>
            <li><a href="add_product.php"><i class="fas fa-plus"></i> New Product</a></li>
            <li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="user_management.php" class="active"><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="home.php" target="_blank"><i class="fas fa-home"></i> View Website</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>User Management</h1>
            <div class="profile">
                <a href="profile.php" class="profile-btn">
                    <img src="img/pfp.jpg" alt="Profile" class="profile-img">
                    <span>My Profile</span>
                </a>
                <button onclick="window.location.href='logout.php'" class="logout-btn">Logout</button>
            </div>
        </header>

        <section>
            <h2>All Users</h2>
            <button onclick="openAddPopup()" class="add-user-btn">+ Add New User</button>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($users as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td><?php echo htmlspecialchars($row['registration_date']); ?></td>
                        <td>
                      <form method="post" action="handle_user.php" style="display:inline;">
                         <input type="hidden" name="deleteUser" value="<?php echo $row['id']; ?>">
                         <button class="delete-btn" type="submit">Delete</button>
                    </form>

                <button class="edit-btn" onclick="openEditPopup('<?php echo htmlspecialchars($row['id']); ?>', '<?php echo htmlspecialchars($row['name']); ?>', '<?php echo htmlspecialchars($row['email']); ?>', '<?php echo htmlspecialchars($row['status']); ?>', '<?php echo htmlspecialchars($row['role']); ?>', '<?php echo htmlspecialchars($row['registration_date']); ?>')">Edit</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
    </div>

    <div id="add-popup" class="popup" style="display:none;">
        <div class="popup-content">
            <button class="close-btn" onclick="closePopup()">X</button>
            <h2>Add User</h2>
            <form method="post" action="handle_user.php">
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
                <button type="submit" name="createUser">Create User</button>
            </form>
        </div>
    </div>

    <div id="edit-popup" class="popup" style="display:none;">
        <div class="popup-content">
            <button class="close-btn" onclick="closePopup()">X</button>
            <h2>Edit User</h2>
            <form method="post" action="handle_user.php">
                <input type="hidden" id="edit-id" name="id">
                <input type="text" id="edit-name" name="name" required>
                <input type="email" id="edit-email" name="email" required>
                <select id="edit-status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <select id="edit-role" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="date" id="edit-registration_date" name="registration_date">
                <input type="password" id="edit-password" name="password" placeholder="New Password (leave blank if unchanged)">
                <button type="submit" name="updateUser">Update</button>
            </form>
        </div>
    </div>

</body>
</html>
