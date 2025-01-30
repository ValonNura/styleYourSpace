<?php
require_once 'database.php';
require_once 'userContactManager.php';
require_once 'subscribe.php';

session_start();

// Krijimi i lidhjes së bazës së të dhënave dhe kalimi i tij në konstruktues
$db = new Database('localhost', 'projekti', 'root', '');

// Krijimi i objekteve të menaxhimit të përdoruesve dhe mesazheve
$userManager = new User($db->connect());
$contactMessageManager = new ContactMessage($db->connect());

// Funksionaliteti për fshirjen e mesazheve
if (isset($_GET['delete_message_id'])) {
    $messageId = $_GET['delete_message_id'];
    $result = $contactMessageManager->deleteMessage($messageId);

    // Kthejmë një përgjigje JSON që do të përdoret nga JavaScript
    echo json_encode(['status' => $result ? 'success' : 'failure']);
    exit();
}

// Marrja e të dhënave
$totalUsers = $userManager->getTotalUsers();
$recentMessages = $contactMessageManager->getRecentMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Sidebar dhe seksioni i profilit -->
<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="#furniture"><i class="fas fa-couch"></i> Furniture</a></li>
        <li><a href="orders.php"><i class="fas fa-box"></i> Orders</a></li>
        <li><a href="profile.php" class="active"><i class="fas fa-user-cog"></i> Account Settings</a></li>
        <li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>
        <li><a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <header>
        <h1>Your Profile</h1>
        <div class="profile">
            <a href="profile.php" class="profile-btn">
                <img src="img/pfp.jpg" alt="Profile" class="profile-img">
                <span>Your Profile</span>
            </a>
            <button onclick="window.location.href='logout.php'" class="logout-btn">Logout</button>
        </div>
    </header>

    <section class="profile-settings">
        <form action="#" method="POST" class="profile-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="admin123" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="admin@example.com" required>
            </div>

            <div class="form-group">
                <label for="contact-messages">New Contact Messages:</label>
                <div class="messages-list">
                    <?php if (empty($recentMessages)): ?>
                        <div class="message-item">No new messages</div>
                    <?php else: ?>
                        <?php foreach ($recentMessages as $message): ?>
                            <div class="message-item" id="message-<?php echo $message['id']; ?>">
                                <div class="message-header">
                                    <strong><?php echo htmlspecialchars($message['name']); ?></strong>
                                </div>
                                <div class="message-body">
                                    <p><?php echo htmlspecialchars($message['message']); ?></p>
                                </div>
                                <div class="message-footer">
                                    <span class="message-date"><?php echo date('Y-m-d H:i', strtotime($message['created_at'])); ?></span>
                                    <button type="button" class="delete-message" onclick="deleteMessage(<?php echo $message['id']; ?>)">Delete</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="total-users">Total Users Managed:</label>
                <input type="text" id="total-users" value="<?php echo $totalUsers; ?>" readonly>
            </div>
        </form>
    </section>
</div>

<script>
    function deleteMessage(messageId) {
        fetch(`profile.php?delete_message_id=${messageId}`, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.getElementById(`message-${messageId}`).remove();
            } else {
                alert('Error: Message could not be deleted.');
            }
        })
        .catch(error => console.error('Error deleting message:', error));
    }
</script>

</body>
</html>
