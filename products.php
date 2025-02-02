<?php
session_start();
require_once 'database.php';
require_once 'Product.php';

$db = (new Database('localhost', 'projekti', 'root', 'loni1234'))->connect();
$productHandler = new Product($db);

$category = $_GET['category'] ?? 'all';
$sort = $_GET['sort'] ?? '';


$products = $productHandler->getProducts($category, $sort);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style Your Space | Products</title>
    <link rel="stylesheet" href="css/products.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <section class="header">
        <nav>
            <div class="hamburger" onclick="toggleMenu()">
                <i class="fa fa-bars"></i>
            </div>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php">About us</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contactus.php">Contact us</a></li>
                    <li><a href="blog.php">Blog</a></li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="SignIn.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="SignIn.php">Sign in</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <h1 class="products-title">Products</h1>
    </section>

    <div class="container">
        <div class="filter-container">
            <div class="filter-buttons">
                <button class="filter-btn" data-filter="all">All</button>
                <button class="filter-btn" data-filter="bestseller">Best Sellers</button>
                <button class="filter-btn" data-filter="sale">On Sale</button>
            </div>
            <div class="sort-options">
                <select id="sort-select">
                    <option value="">Sort by</option>
                    <option value="name-asc">Name (A-Z)</option>
                    <option value="name-desc">Name (Z-A)</option>
                    <option value="price-asc">Price (Low to High)</option>
                    <option value="price-desc">Price (High to Low)</option>
                </select>
                <select id="categorySelect">
                    <option value="all">All Categories</option>
                    <option value="lighting">Lighting</option>
                    <option value="beds">Beds</option>
                    <option value="sofas">Sofas</option>
                    <option value="dressers">Dressers</option>
                    <option value="chairs">Chairs</option>
                    <option value="decor">Decor</option>
                </select>
            </div>
        </div>
        <main>
            <?php
            $categories = [];
            foreach ($products as $product) {
                $categories[$product['category']][] = $product;
            }
            ?>

            <?php foreach ($categories as $category => $categoryProducts): ?>
                <section class="category" id="<?= htmlspecialchars($category); ?>">
                    <h3><?= ucfirst(htmlspecialchars($category)); ?></h3>
                    <div class="products">
                        <?php foreach ($categoryProducts as $product): ?>
                            <div class="product" data-category="<?= htmlspecialchars($product['category']); ?>">
                                <a href="product_details.php?id=<?= htmlspecialchars($product['id']); ?>" class="product-link">

                                    <?php if ($product['is_best_seller']): ?>
                                        <div class="bestseller-label">Best Seller</div>
                                    <?php endif; ?>
                                    <div class="image-container">
                                        <img class="default" src="<?= htmlspecialchars($product['image_default']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                                        <img class="hover" src="<?= htmlspecialchars($product['image_hover']); ?>" alt="<?= htmlspecialchars($product['name']); ?> Hover">
                                    </div>
                                    <h4><?= htmlspecialchars($product['name']); ?></h4>
                                    <p class="dimensions"><?= htmlspecialchars($product['dimensions']); ?></p>
                                    <div class="price-container">
                                        <p class="price">
                                            <?php if (!empty($product['old_price']) && $product['old_price'] != '0.00'): ?>
                                                <span class="old-price">$<?= htmlspecialchars($product['old_price']); ?></span>
                                            <?php endif; ?>
                                            $<?= htmlspecialchars($product['price']); ?>
                                        </p>
                                    </div>
                                    <div class="stars">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="fa<?= $i <= $product['rating'] ? 's' : 'r'; ?> fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </main>

    </div>
    <section class="footer">
        <div class="footer-boxes">
            <div class="footer-box">
                <h4>Stay connected with us</h4>
                <p>Follow us on social media for the latest updates, inspiration, and more!</p>
                <div class="icons">
                    <a href="https://facebook.com" target="_blank" aria-label="Visit our Facebook page">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" aria-label="Visit our Instagram page">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" aria-label="Visit our LinkedIn page">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
            <div class="footer-box">
                <h4>Subscribe to our newsletter</h4>
                <p>Subscribe for exclusive deals and updates!</p>
                <form class="newsletter" action="subscribe.php" method="POST">
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <p>&copy; 2024 Style Your Space. All rights reserved.</p>
    </section>
    <script src="script.js"></script>
</body>

</html>ection>


<script src="js/script.js"></script>
<script>
    document.getElementById("subscribeForm").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch("subscribe.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                document.getElementById("email").value = "";
            })
            .catch(error => console.error("Error:", error));
    });
</script>
<script>
    function toggleMenu() {
        document.getElementById("navLinks").classList.toggle("active");
    }
</script>
</body>

</html>