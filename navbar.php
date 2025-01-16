<?php
session_start();
?>

<nav class="navbar">
    <div class="nav-content">
        <?php if (!isset($_SESSION['user_role'])) { ?>
            <!-- Show Sign In only when user is NOT logged in -->
            <a href="SignIn.php" class="nav-item">Sign In</a>
        <?php } else { ?>
            <!-- Show these items only when user is logged in -->
            <a href="cart.php" class="nav-item"><i class="fas fa-shopping-cart"></i></a>
            <a href="logout.php" class="nav-item">Logout</a>
        <?php } ?>
    </div>
</nav>
