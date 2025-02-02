<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php"); 
    exit();
}

require_once 'database.php';
require_once 'DashboardManager.php';
require_once 'DashboardController.php';

$db = (new Database('localhost', 'projekti', 'root', 'loni1234'))->connect();

$dashboardManager = new DashboardManager($db);
$dashboardController = new DashboardController($dashboardManager);

$data = $dashboardController->getDashboardData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="products.php"><i class="fas fa-couch"></i> Products</a></li>
            <li><a href="orders.php"><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="profile.php"><i class="fas fa-user-cog"></i> Account Settings</a></li>
            <li><a href="add_product.php"><i class="fas fa-plus"></i> New Product</a></li>
            <li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="user_management.php"><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="home.php" target="_blank"><i class="fas fa-home"></i> View Website</a></li>
        </ul>    
    </div>

    <div class="main-content">
        <header>
            <h1>Admin Dashboard</h1>
            <div class="profile">
                <a href="profile.php" class="profile-btn">
                    <img src="img/pfp.jpg" alt="Profile" class="profile-img">
                    <span>Your Profile</span>
                </a>
                <button onclick="window.location.href='logout.php'" class="logout-btn">Logout</button>
            </div>
        </header>

        <section id="overview" class="dashboard-section">
            <h2>Overview</h2>
            <div class="cards">
                <div class="card">
                    <div class="card-icon"><i class="fas fa-users"></i></div>
                    <h3>Total Users</h3>
                    <p><?php echo $data['totalUsers']; ?> Active Users</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-box"></i></div>
                    <h3>Total Orders</h3>
                    <p><?php echo $data['totalOrders']; ?> Completed Orders</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-dollar-sign"></i></div>
                    <h3>Total Revenue</h3>
                    <p>$<?php echo $data['totalRevenue']; ?> This Month</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-star"></i></div>
                    <h3>Best Selling Products</h3>
                    <p><?php echo $data['bestSellingProducts']; ?> Products</p>
                </div>
            </div>
        </section>

        <section id="recent-orders" class="dashboard-section">
            <h2>Recent Orders</h2>
            <ul class="activity-list">
                <?php foreach ($data['recentOrders'] as $order): ?>
                    <li><?php echo htmlspecialchars($order['product_name']); ?> - $<?php echo htmlspecialchars($order['total_price']); ?> (<?php echo htmlspecialchars($order['order_date']); ?>)</li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section id="recent-contacts" class="dashboard-section">
            <h2>Recent Contacts</h2>
            <ul class="activity-list">
                <?php foreach ($data['recentContacts'] as $contact): ?>
                    <li><?php echo htmlspecialchars($contact['name']); ?> - <?php echo htmlspecialchars($contact['message']); ?> (<?php echo htmlspecialchars($contact['created_at']); ?>)</li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
</body>
</html>
