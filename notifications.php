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
            <li><a href="dashboard.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#furniture"><i class="fas fa-couch"></i> Furniture</a></li>
            <li><a href="orders.html"><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="profile.html"><i class="fas fa-user-cog"></i> Account Settings</a></li>
            <li><a href="analytics.html"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="notifications.html" class="active"><i class="fas fa-bell"></i> Notifications</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Notifications</h1>
            <div class="profile">
                <a href="profile.html" class="profile-btn">
                    <img src="img/pfp.jpg" alt="Profile" class="profile-img">
                    <span>Your Profile</span>
                </a>
                <button class="logout-btn">Log Out</button>
            </div>
        </header>

        <section id="notifications-section" class="dashboard-section">
            <h2>Recent Notifications</h2>
            <div class="cards">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>New Contact Request</h3>
                    <p>John Doe sent a message: "Looking forward to your designs!"</p>
                    <button class="action-btn view-btn" onclick="handleAction('view', 'John Doe')">View</button>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>New Subscription</h3>
                    <p>Emily Johnson subscribed to your newsletter.</p>
                    <button class="action-btn details-btn" onclick="handleAction('details', 'Emily Johnson')">Details</button>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>New Order</h3>
                    <p>Order #011 placed by Michael Brown.</p>
                    <button class="action-btn track-btn" onclick="handleAction('track', 'Order #011')">Track</button>
                </div>
            </div>
        </section>
        
        
        <h2>Notifications Log</h2>
        <div class="notifications-container">
            <div class="notification-card">
                <div class="card-header">
                    <span class="type">Contact</span>
                    <span class="date">2025-01-12</span>
                </div>
                <div class="card-body">
                    <p><strong>John Doe</strong>: "Can you provide a modern living room design?"</p>
                </div>
            </div>
           
            <div class="notification-card">
                <div class="card-header">
                    <span class="type">Subscription</span>
                    <span class="date">2025-01-12</span>
                </div>
                <div class="card-body">
                    <p><strong>Emily Johnson</strong> subscribed to the newsletter.</p>
                </div>
            </div>
            
            <div class="notification-card">
                <div class="card-header">
                    <span class="type">Order</span>
                    <span class="date">2025-01-13</span>
                </div>
                <div class="card-body">
                    <p>Order #010 placed by <strong>Sarah Connor</strong>.</p>
                </div>
            </div>
           
            <div class="notification-card">
                <div class="card-header">
                    <span class="type">Contact</span>
                    <span class="date">2025-01-13</span>
                </div>
                <div class="card-body">
                    <p><strong>Liridon Berisha</strong>: "Interested in a custom dining table."</p>
                </div>
            </div>
        </div>
        

</body>
</html>


<script>
    function handleAction(action, target) {
        switch(action) {
            case 'view':
                alert(`Viewing details for ${target}`);
               
                break;
            case 'details':
                alert(`Showing more details for ${target}`);
             
                break;
            case 'track':
                alert(`Tracking progress for ${target}`);
             
                break;
            default:
                alert('Action not recognized.');
        }
    }
</script>
