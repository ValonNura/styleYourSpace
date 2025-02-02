<?php
session_start();
session_unset(); 
session_destroy(); 
header('Location: SignIn.php'); 

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

echo '<script>
    window.history.replaceState({}, document.title, window.location.pathname);
    window.location.href = "SignIn.php";
</script>';
exit();
?>