<?php
require_once 'database.php';
require_once 'Product.php';

$db = (new Database('localhost', 'projekti', 'root', 'loni1234'))->connect();
$productHandler = new Product($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $productHandler->addProduct($_POST, $_FILES);
    
    
    header("Location: add_product.php?message=" . urlencode($result));
    exit();
}
?>
