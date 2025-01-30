<?php
session_start();
?>

<nav class="navbar">
    <div class="nav-content">
        <?php if (!empty($_SESSION['user_id'])) { ?>
            <a href="cart.php" class="nav-item"><i class="fas fa-shopping-cart"></i></a>
            <a href="logout.php" class="nav-item">Logout</a>
        <?php } else { ?>
            <a href="SignIn.php" class="nav-item">Sign In</a>
        <?php } ?>
    </div>
</nav>
