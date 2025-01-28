<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekti";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT name, email, message, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') as created_at FROM contacts ORDER BY created_at DESC");
    $stmt->execute();

    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($contacts);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
