<?php

session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php"); 
    exit();
}


header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache");
header("Expires: 0");


if (isset($_GET['message'])) {
    echo "<script>alert('" . $_GET['message'] . "');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/addproduct.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Add New Product</h1>
        <form action="process_product.php" method="POST" enctype="multipart/form-data">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option value="lighting">Lighting</option>
                <option value="beds">Beds</option>
                <option value="sofas">Sofas</option>
                <option value="dressers">Dressers</option>
                <option value="chairs">Chairs</option>
                <option value="decor">Decor</option>
            </select>
            
            <label for="dimensions">Dimensions:</label>
            <input type="text" name="dimensions" id="dimensions">
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" required>
            
            <label for="old_price">Old Price (Optional):</label>
            <input type="number" step="0.01" name="old_price" id="old_price">
            
            <label for="image_default">Default Image:</label>
            <input type="file" name="image_default" id="image_default" required>
            
            <label for="image_hover">Hover Image:</label>
            <input type="file" name="image_hover" id="image_hover" required>
            
            <label for="is_best_seller">Is Best Seller:</label>
            <select name="is_best_seller" id="is_best_seller">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            
            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" id="rating" min="1" max="5">
            
            <label for="stock">Stock Quantity (Max: 10):</label>
            <input type="number" name="stock" id="stock" min="0" max="10" value="10" required>

            <label for="description">Product Description:</label>
            <textarea name="description" id="description" required></textarea>


            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
