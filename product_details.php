<?php
require_once 'ProductDetails.php';

session_start();

$productDetails = new ProductDetails();
$product = null;
$relatedProducts = [];

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $_GET['id'];
    $product = $productDetails->getProductDetails($productId);

    if (!$product) {
        echo "Product not found.";
        exit;
    }

    $relatedProducts = $productDetails->getRelatedProducts($product['category'], $productId);
} else {
    echo "Invalid product ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> - Product Details</title>
    <link rel="stylesheet" href="css/product_details.css?v=2">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="cartTab" id="cartTab">
    <h1>Shopping Cart</h1>
    <div class="listCart" id="listCart">
 
    </div>

    <div class="btn">
        <button class="close" id="closeCartBtn">CLOSE</button>
        <a href="#" id="checkout-btn" class="checkout-btn">Checkout</a>

    </div>
</div>



<section class="header">
<nav>
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
            <li>
              <i id="cart-icon" class="fas fa-shopping-cart"></i>
              <span id="cart-count" class="cart-count">0</span>
            </li>
        </ul>
    </div>
</nav>
</section>


<div class="product-container">
<div class="carousel-container">
    <div class="carousel">
        <button id="prevBtn"><i class="fas fa-angle-left"></i></button>
        <div class="slides-container">
           
            <div class="slide"><img id="main-image" src="<?= htmlspecialchars($product['image_default']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"></div>
            <div class="slide"><img src="<?= htmlspecialchars($product['image_hover']) ?>" alt="<?= htmlspecialchars($product['name']) ?> Hover"></div>
        </div>
        <button id="nextBtn"><i class="fas fa-angle-right"></i></button>
    </div>
    
    <div class="thumbnails">
        <img src="<?= htmlspecialchars($product['image_default']) ?>" alt="Thumbnail 1" class="thumbnail active">
        <img src="<?= htmlspecialchars($product['image_hover']) ?>" alt="Thumbnail 2" class="thumbnail">
    </div>
</div>


    <div class="product-details">
        <h1 class="product-title"><?= htmlspecialchars($product['name']) ?>

     
        <?php if ($product['stock'] == 0): ?>
            <p class="out-of-stock">❌ Out of Stock</p>
        <?php endif; ?>
        </h1>
        <div class="price-container">
            <?php if (!empty($product['old_price']) && $product['old_price'] > 0): ?>
                <p class="old-price">$<?= number_format($product['old_price'], 2) ?></p>
            <?php endif; ?>
            <p class="product-price">$<?= number_format($product['price'], 2) ?></p>
        </div>


    
       <div class="product-rating">
            <span class="star-rating">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <i class="<?= ($i <= $product['rating']) ? 'fas' : 'far' ?> fa-star"></i>
                <?php endfor; ?>
            </span>
            <p class="rating-text"><?= $product['rating'] ?>/5 (<?= rand(20, 100) ?> reviews)</p>
        </div>

<div class="shipping-options">
    <div class="option">
        <input type="radio" id="ship-it" name="shipping" checked>
        <label for="ship-it">
            Ship It
            <div class="delivery-info">
                <span>In stock and ready for delivery</span>
            </div>
        </label>
        <select id="zip-code-dropdown" class="zip-code-dropdown">
            <option value="" disabled selected>Zipcode</option>
            <option value="10000">10000 - Prishtinë</option>
            <option value="20000">20000 - Prizren</option>
            <option value="50000">50000 - Mitrovicë</option>
        </select>
    </div>
</div>


       
        <div class="quantity-cart">
            <div class="quantity-selector">
                <button id="decrease-quantity" <?= ($product['stock'] > 0) ? '' : 'disabled' ?>>-</button>
                <input type="number" id="quantity" value="1" min="1" max="<?= $product['stock'] ?>" <?= ($product['stock'] > 0) ? '' : 'disabled' ?>>
                <button id="increase-quantity" <?= ($product['stock'] > 0) ? '' : 'disabled' ?>>+</button>
            </div>
            <div class="total-price">
                <span>Total: $<span id="total-price"><?= number_format($product['price'], 2) ?></span></span>
            </div>
        </div>

        <button class="add-to-cart" id="addToCartBtn" <?= ((int)$product['stock'] <= 0) ? 'disabled' : '' ?>>Add to Cart</button>

        <div class="description-section">
            <h2 class="text-titles" id="description-title">Description</h2>
            <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
        </div>
    </div>
</div>
    </div>
    
    <section class="related-products">
    <h2 class="text-titles" id="related-title">Related Products</h2>
    <div class="products-grid">
        <?php foreach (array_slice($relatedProducts, 0, 4) as $related): ?>
            <div class="product-card">
                <a href="product_details.php?id=<?= $related['id'] ?>">
                    <img src="<?= htmlspecialchars($related['image_default']) ?>" alt="<?= htmlspecialchars($related['name']) ?>">
                    <div class="info">
                        <h3><?= htmlspecialchars($related['name']) ?></h3>
                        <div class="price">
                            <?php if (!empty($related['old_price']) && $related['old_price'] > 0): ?>
                                <span class="old-price">$<?= number_format($related['old_price'], 2) ?></span>
                            <?php endif; ?>
                            <span class="new-price">$<?= number_format($related['price'], 2) ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

</div>
<section class="footer">
            <div class="footer-boxes">
                <div class="footer-box">
                    <h4>Stay connected with us</h4>
                    <p>Follow us on social media for the latest updates, inspiration, and more!</p>
                    <div class="icons">
                        <a href="https://facebook.com" target="_blank" aria-label="Visit our Facebook page"><i class="fab fa-facebook"></i></a>
                        <a href="https://instagram.com" target="_blank" aria-label="Visit our Instagram page"><i class="fab fa-instagram"></i></a>
                        <a href="https://linkedin.com" target="_blank" aria-label="Visit our LinkedIn page"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-box">
                    <h4>Subscribe to our newsletter</h4>
                    <p>Subscribe for exclusive deals and updates!</p>
                    <form class="newsletter" action="#">
                        <input type="email" placeholder="Enter your email" required />
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <p>&copy; 2024 Style Your Space. All rights reserved.</p>
        </section>
<script>
document.addEventListener("DOMContentLoaded", () => {
    let thumbnails = document.querySelectorAll('.thumbnail');
    let mainImage = document.getElementById('main-image');
    let slides = document.querySelectorAll('.slide img');
    let currentIndex = 0;
    let quantityInput = document.getElementById("quantity");
    let totalPrice = document.getElementById("total-price");
    let pricePerUnit = <?= $product['price'] ?>;
    let maxStock = <?= $product['stock'] ?>;

    let images = Array.from(slides).map(slide => slide.src);

    function updateImage(index) {
        mainImage.src = images[index];
        thumbnails.forEach(thumb => thumb.classList.remove('active'));
        thumbnails[index].classList.add('active');
    }


    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            currentIndex = index;
            updateImage(currentIndex);
        });
    });

  
    document.getElementById('prevBtn').addEventListener('click', () => {
        currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
        updateImage(currentIndex);
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
        updateImage(currentIndex);
    });

  
    quantityInput.addEventListener("input", function() {
        let quantity = parseInt(quantityInput.value);

        if (isNaN(quantity) || quantity < 1) {
            quantityInput.value = 1;
        } else if (quantity > maxStock) {
            quantityInput.value = maxStock;
        }

        totalPrice.innerText = (quantityInput.value * pricePerUnit).toFixed(2);
    });
});

document.addEventListener("DOMContentLoaded", () => {
    let quantityInput = document.getElementById("quantity");
    let increaseButton = document.getElementById("increase-quantity");
    let decreaseButton = document.getElementById("decrease-quantity");
    let totalPrice = document.getElementById("total-price");
    let pricePerUnit = <?= $product['price'] ?>; 
    let maxStock = <?= $product['stock'] ?>; 

    increaseButton.addEventListener("click", () => {
        let quantity = parseInt(quantityInput.value);
        if (quantity < maxStock) {
            quantityInput.value = quantity + 1;
            totalPrice.innerText = (quantityInput.value * pricePerUnit).toFixed(2);
        }
    });

    decreaseButton.addEventListener("click", () => {
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
            totalPrice.innerText = (quantityInput.value * pricePerUnit).toFixed(2);
        }
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const zipCodeDropdown = document.getElementById("zip-code-dropdown");

    
    zipCodeDropdown.disabled = false;
});


document.addEventListener("DOMContentLoaded", () => {
    const cartIcon = document.getElementById("cart-icon");
    const cartTab = document.getElementById("cartTab");
    const closeCartBtn = document.getElementById("closeCartBtn");
    const listCart = document.getElementById("listCart");
    const addToCartBtn = document.getElementById("addToCartBtn");
    const cartCount = document.getElementById("cart-count");

    
    cartIcon.addEventListener("click", () => {
        loadCartItems();
        cartTab.classList.add("open");
    });

    
    closeCartBtn.addEventListener("click", () => {
        cartTab.classList.remove("open");
    });

    
    addToCartBtn.addEventListener("click", () => {
        const productId = <?= $product['id'] ?>;
        const productName = "<?= htmlspecialchars($product['name']) ?>";
        const productImage = "<?= htmlspecialchars($product['image_default']) ?>";
        const productPrice = <?= $product['price'] ?>;
        const quantity = parseInt(document.getElementById("quantity").value);

        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        const existingItemIndex = cart.findIndex(item => item.id === productId);

        if (existingItemIndex > -1) {
            cart[existingItemIndex].quantity += quantity;
        } else {
            cart.push({
                id: productId,
                name: productName,
                image: productImage,
                price: productPrice,
                quantity: quantity
            });
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartCount();
        loadCartItems();
    });

    
    function loadCartItems() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        listCart.innerHTML = '';

        if (cart.length === 0) {
            listCart.innerHTML = '<p>Your cart is empty.</p>';
            return;
        }

        cart.forEach((item, index) => {
            const cartItemHTML = `
                <div class="item" data-index="${index}">
                    <div class="image">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="name">${item.name}</div>
                    <div class="totalPrice">$${(item.price * item.quantity).toFixed(2)}</div>
                    <div class="quantity">
                        <span class="minus">&lt;</span>
                        <span>${item.quantity}</span>
                        <span class="plus">&gt;</span>
                    </div>
                </div>
            `;
            listCart.innerHTML += cartItemHTML;
        });

       
        document.querySelectorAll('.quantity .minus').forEach(btn => {
            btn.addEventListener('click', (e) => adjustQuantity(e, -1));
        });
        document.querySelectorAll('.quantity .plus').forEach(btn => {
            btn.addEventListener('click', (e) => adjustQuantity(e, 1));
        });
    }

   
    function adjustQuantity(e, change) {
        const itemIndex = e.target.closest('.item').dataset.index;
        let cart = JSON.parse(localStorage.getItem("cart"));

        cart[itemIndex].quantity += change;
        if (cart[itemIndex].quantity <= 0) {
            cart.splice(itemIndex, 1);  
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        loadCartItems();
        updateCartCount();
    }

    
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.innerText = totalItems;
    }

    updateCartCount();
});
document.getElementById('checkout-btn').addEventListener('click', function(event) {
    event.preventDefault();

    const selectedZipCode = document.getElementById('zip-code-dropdown').value;
    const quantity = document.getElementById('quantity').value;
    const productId = <?= $product['id'] ?>;

    if (!selectedZipCode) {
        alert('Please select a zip code before proceeding to checkout.');
        return;
    }

    const checkoutUrl = `checkout_view.php?product_id=${productId}&zip_code=${selectedZipCode}&quantity=${quantity}`;
    window.location.href = checkoutUrl;
});



</script>




</body>
</html>
