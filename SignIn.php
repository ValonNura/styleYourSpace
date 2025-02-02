<?php
session_start(); 
require_once 'database.php'; 

$db = new Database('localhost', 'projekti', 'root', 'loni1234');
$connection = $db->connect();

if (!$connection) {
    die("Database connection failed.");
}

$error = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $user = new User($connection);
    $error = $user->login($email, $password);
}

class User {
    private $connection;

    public function __construct($db) {
        $this->connection = $db;
    }

    public function login($email, $password) {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        
        if (!$stmt->execute()) {
            die("Query execution failed: " . implode(", ", $stmt->errorInfo()));
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            return "User not found."; 
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            if ($user['role'] === 'admin') {
                header('Location: dashboard.php');
                exit();
            } else {
                header('Location: home.php');
                exit();
            }
        } else {
            return "Invalid password."; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: <?php echo !empty($error) ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container" id="loginForm">
            <h2>Log in</h2>
            <form action="SignIn.php" method="POST">
                <div id="loginError" class="error-message"><?php echo $error; ?></div>
                <input type="email" id="loginEmail" name="loginEmail" placeholder="Email" required>
                <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required>
                <button type="submit" class="animated-button">Log in</button>
            </form>
            <p>
                Don't have an account?
                <span onclick="toggleForm()">Sign up</span>
            </p>
            <div class="social-login">
                <p>Or log in with:</p>
                <div>
                    <button class="social-btn facebook" onclick="redirectTo('https://www.facebook.com/login')">Facebook</button>
                    <button class="social-btn google" onclick="redirectTo('https://accounts.google.com/signin')">Google</button>
                </div>
            </div>
        </div>

        <div class="form-container hidden" id="signupForm">
            <h2>Sign up</h2>
            <form method="POST" action="signup.php" onsubmit="return validateSignup()">
                <div id="signupError" class="error-message"></div>
                <input type="text" id="signupName" name="signupName" placeholder="Full Name" required>
                <input type="email" id="signupEmail" name="signupEmail" placeholder="Email" required
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    title="Please enter a valid email address (e.g., user@example.com)">
                <input type="password" id="signupPassword" name="signupPassword" placeholder="Password" required minlength="8">
                <input type="password" id="signupConfirmPassword" name="signupConfirmPassword" placeholder="Confirm Password" required minlength="8">
                <button type="submit" class="animated-button">Sign up</button>
            </form>
            <p>
                Already have an account? <span onclick="toggleForm()">Log in</span>
            </p>
        </div>
    </div>

    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>
    <script src="script.js"></script>
    <?php if (isset($_GET['signup']) && $_GET['signup'] == 'success'): ?>
    <script>
        window.onload = function() {
            alert('Signup successful! You can now log in.');
        };
    </script>
<?php endif; ?>

</body>
</html>
