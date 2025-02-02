<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php"); 
    exit();
}


header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache");
header("Expires: 0");
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
            <li><a href="products.php"><i class="fas fa-couch"></i> Furniture</a></li>
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
                    <p>150 Active Users</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-box"></i></div>
                    <h3>Total Orders</h3>
                    <p>120 Completed Orders</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-dollar-sign"></i></div>
                    <h3>Total Revenue</h3>
                    <p>$5,000 This Month</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-paint-roller"></i></div>
                    <h3>Active Designs</h3>
                    <p>35 Published Designs</p>
                </div>
            </div>
        </section>

        <section id="analytics" class="dashboard-section">
            <h2>Sales Analytics</h2>
            <canvas id="salesChart"></canvas>
        </section>

        <section id="tasks" class="dashboard-section">
            <h2>Admin To-Do List</h2>
            <ul class="todo-list">
                <li>Review new orders <button class="mark-done">Mark as Done</button></li>
                <li>Update homepage banner <button class="mark-done">Mark as Done</button></li>
                <li>Respond to user feedback <button class="mark-done">Mark as Done</button></li>
            </ul>
        </section>

        <section id="activity-feed" class="dashboard-section">
            <h2>Latest Activity</h2>
            <ul class="activity-list">
                <li>John Doe registered 5 minutes ago.</li>
                <li>Order #123 placed 10 minutes ago.</li>
                <li>Anna left a comment on Modern Living Room.</li>
            </ul>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Sales',
                    data: [1200, 1900, 3000, 5000, 2400],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
