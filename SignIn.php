<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="img/favicon-32x32.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>
    <div class="container">
      
      
      <div class="form-container" id="loginForm">
        <h2>Log in</h2>
        <form action="SignIn.php" method="POST">
          <div id="loginError" class="error-message"></div>
          <input type="email" id="loginEmail" name="loginEmail" placeholder="Email" required />
          <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required />
          <button type="submit" class="animated-button">Log in</button>
        </form>
        <p>
          Don't have an account?
          <span onclick="toggleForm()">Sign up</span>
        </p>
        <div class="social-login">
          <p>Or log in with:</p>
          <div>
          
            <button
              class="social-btn facebook"
              onclick="redirectTo('https://www.facebook.com/login')"
            >
              Facebook
            </button>
        
            <button
              class="social-btn google"
              onclick="redirectTo('https://accounts.google.com/signin')"
            >
              Google
            </button>
          </div>
        </div>
      </div>

      <div class="form-container hidden" id="signupForm">
        <h2>Sign up</h2>
        <form onsubmit="return validateSignup()">
          <div id="signupError" class="error-message"></div>
          <input type="text" id="signupName" placeholder="Full Name" required />
          <input
            type="email"
            id="signupEmail"
            placeholder="Email"
            required
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="Please enter a valid email address (e.g., user@example.com)"
          />
          <input
            type="password"
            id="signupPassword"
            placeholder="Password"
            required
            minlength="8"
            title="Password must be at least 8 characters long"
          />
          <input
            type="password"
            id="signupConfirmPassword"
            placeholder="Confirm Password"
            required
            minlength="8"
            title="Password must be at least 8 characters long"
          />
          
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
    <?php
    require_once 'Database.php'; 

    session_start(); 

    $db = new Database('localhost', 'projektifinal', 'root', 'loni1234');
    $connection = $db->connect();

    if (!$connection) {
        die("Database connection failed.");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        var_dump($email, $password); 

        $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        
        if (!$stmt->execute()) {
            die("Query execution failed: " . implode(", ", $stmt->errorInfo()));
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        var_dump($user); 
        if ($user && $user['password'] === $password) {
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
            echo "<script>document.getElementById('loginError').innerText = 'Invalid credentials';</script>";
            
        }
    }
    ?>
  </body>
</html>
