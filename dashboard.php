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
            <li><a href="orders.php" ><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="profile.php"><i class="fas fa-user-cog"></i> Account Settings</a></li>
            <li><a href="add_product.php"><i class="fas fa-plus"></i>  New Product</a></li>
            <li><a href="analytics.php" class="active"><i class="fas fa-chart-line"></i> Analytics</a></li>
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

        <section id="design-ideas" class="dashboard-section">
            <h2>Design Ideas</h2>
            <div class="cards">
                <div class="card">
                    <div class="card-icon">🛋️</div>
                    <h3>Modern Living Room</h3>
                    <p>Cozy and elegant living room with contemporary furniture.</p>
                </div>
                <div class="card">
                    <div class="card-icon">🛏️</div>
                    <h3>Minimalist Bedroom</h3>
                    <p>A simple bedroom with sleek furniture and neutral tones.</p>
                </div>
            </div>
        </section>

        <section id="furniture" class="dashboard-section">
            <h2>Furniture</h2>
            <div class="cards">
                <div class="card">
                    <div class="card-icon">🪑</div>
                    <h3>Wooden Coffee Table</h3>
                    <p>Price: $120</p>
                </div>
                <div class="card">
                    <div class="card-icon">🛋️</div>
                    <h3>Modern Sofa</h3>
                    <p>Price: $350</p>
                </div>
            </div>
        </section>

        <section id="orders" class="dashboard-section">
            <h2>Orders</h2>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>#001</td>
                    <td>David James</td>
                    <td>Sofa, Coffee Table</td>
                    <td>2025-01-05</td>
                    <td>Shipped</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#002</td>
                    <td>Jane Smith</td>
                    <td>Chair, Lamp</td>
                    <td>2025-01-06</td>
                    <td>Pending</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#003</td>
                    <td>Erion Basha</td>
                    <td>Dining Table, Chairs</td>
                    <td>2025-01-07</td>
                    <td>Pending</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#004</td>
                    <td>Arlinda Kelmendi</td>
                    <td>Bed, Mattress</td>
                    <td>2025-01-08</td>
                    <td>Shipped</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#005</td>
                    <td>Besart Lika</td>
                    <td>Wardrobe, Desk</td>
                    <td>2025-01-09</td>
                    <td>Shipped</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#006</td>
                    <td>Flutura Dema</td>
                    <td>Rug, Ottoman</td>
                    <td>2025-01-10</td>
                    <td>Pending</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#007</td>
                    <td>Michael Brown</td>
                    <td>Sofa, TV Stand</td>
                    <td>2025-01-11</td>
                    <td>Processing</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#008</td>
                    <td>Liridon Berisha</td>
                    <td>Bookshelf, Chair</td>
                    <td>2025-01-12</td>
                    <td>Shipped</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#009</td>
                    <td>Enisa Krasniqi</td>
                    <td>Bed, Nightstand</td>
                    <td>2025-01-13</td>
                    <td>Pending</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>#010</td>
                    <td>Emily Johnson</td>
                    <td>Dining Table, Bench</td>
                    <td>2025-01-14</td>
                    <td>Shipped</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
            </table>
        </section>
        

</body>
</html>