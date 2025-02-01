<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="css/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="products.php"><i class="fas fa-couch"></i> Furniture</a></li>
            <li><a href="orders.php" ><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="profile.php"><i class="fas fa-user-cog"></i> Account Settings</a></li>
            <li><a href="add_product.php"><i class="fas fa-plus"></i>  New Product</a></li>
            <li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="notifications.php" class="active"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="user_management.php"><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="home.php" target="_blank"><i class="fas fa-home"></i> View Website</a></li>

        </ul>    
    </div>

    <div class="main-content">
        <header>
            <h1>Notifications</h1>
            <div class="profile">
                <a href="profile.php" class="profile-btn">
                    <img src="img/pfp.jpg" alt="Profile" class="profile-img">
                    <span>Your Profile</span>
                </a>
                <button onclick="window.location.href='logout.php'" class="logout-btn">Logout</button>
            </div>
        </header>

        <section id="notifications-section" class="dashboard-section">
            <h2>Subscribers</h2>
            <div id="subscriber-notifications" class="notifications-container"></div>

            <h2>Contacts</h2>
            <div id="contact-notifications" class="notifications-container"></div>
        </section>

    </div>

    <script>
        class NotificationFetcher {
            static fetchSubscribers() {
                fetch('get_subscribers.php')
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById('subscriber-notifications');
                        container.innerHTML = data.map(subscriber => `
                            <div class="notification-card">
                                <div class="card-header">
                                    <span class="type">Subscription</span>
                                    <span class="date">${new Date(subscriber.subscribed_at).toLocaleString()}</span>
                                </div>
                                <div class="card-body">
                                    <p><strong>${subscriber.email}</strong> subscribed to the newsletter.</p>
                                </div>
                            </div>
                        `).join('');
                    })
                    .catch(error => console.error('Error fetching subscribers:', error));
            }

            static fetchContacts() {
                fetch('get_contacts.php')
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById('contact-notifications');
                        container.innerHTML = data.map(contact => `
                            <div class="notification-card">
                                <div class="card-header">
                                    <span class="type">Contact</span>
                                    <span class="date">${new Date(contact.created_at).toLocaleString()}</span>
                                </div>
                                <div class="card-body">
                                    <p><strong>${contact.name}</strong> (${contact.email}): "${contact.message}"</p>
                                </div>
                            </div>
                        `).join('');
                    })
                    .catch(error => console.error('Error fetching contacts:', error));
            }
        }

        setInterval(() => {
            NotificationFetcher.fetchSubscribers();
            NotificationFetcher.fetchContacts();
        }, 10000);

        NotificationFetcher.fetchSubscribers();
        NotificationFetcher.fetchContacts();
    </script>

</body>
</html>
