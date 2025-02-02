<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'Product.php';
require_once 'Order.php';
require_once 'Customer.php';
require_once 'Cart.php';

$cart = new Cart();
$cartItems = $cart->getProducts();

$total = 0;
foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer = new Customer($_POST);

    if (!$customer->isValid()) {
        $errors = $customer->getErrors();
    } else {
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/checkout.css">
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const shippingRadios = document.querySelectorAll('input[name="shipping_method"]');
            const grandTotalElement = document.getElementById('grand-total');
            const shippingCostElement = document.getElementById('shipping-cost');

            function updateTotal() {
                let subtotal = <?php echo $total; ?>;
                let shippingCost = document.querySelector('input[name="shipping_method"]:checked').value === 'EMS' ? 18 : 0;
                shippingCostElement.textContent = '$' + shippingCost.toFixed(2);
                grandTotalElement.textContent = '$' + (subtotal + shippingCost).toFixed(2);
            }

            shippingRadios.forEach(radio => {
                radio.addEventListener('change', updateTotal);
            });

            updateTotal(); 
        });

        function displaySuccessMessage() {
            const notification = document.createElement('div');
            notification.className = 'success-notification';
            notification.textContent = 'Order placed successfully!';
            document.body.appendChild(notification);
            setTimeout(() => notification.remove(), 3000); 
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.checkout-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); 

                const formData = new FormData(form);
                fetch('process_order.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        displaySuccessMessage();
                    } else {
                        alert('Failed to place order.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
        
    </script>
</head>
<body>
    <div class="checkout-container">
        <h1>Checkout</h1>
        <?php if (!empty($errors)): ?>
            <div class="error-message">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="CheckoutController.php" class="checkout-form">
            <div class="checkout-section">
                <h2 class="section-title">1. Billing Address</h2>
                <div class="form-row">
                    <label>First Name:<input type="text" name="first_name" value="<?php echo htmlspecialchars($_POST['first_name'] ?? ''); ?>" required></label>
                    <label>Last Name:<input type="text" name="last_name" value="<?php echo htmlspecialchars($_POST['last_name'] ?? ''); ?>" required></label>
                </div>
                <div class="form-row">
                    <label>Email Address:<input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+"></label>
                    <label>Telephone:<input type="tel" name="telephone" value="<?php echo htmlspecialchars($_POST['telephone'] ?? ''); ?>" required pattern="\+?[0-9\-\s]{10,15}"></label>
                </div>
                <label>Address:<input type="text" name="address" value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>" required></label>
                <div class="form-row">
                    <label>City:<input type="text" name="city" value="<?php echo htmlspecialchars($_POST['city'] ?? ''); ?>" required></label>
                    <label>State/Province:<input type="text" name="state_province" value="<?php echo htmlspecialchars($_POST['state_province'] ?? ''); ?>" required></label>
                </div>
                <div class="form-row">
                    <?php if (!empty($selected_zip_code)): ?>
                        <label>Zip Code:<input type="text" name="zip_code" value="<?php echo htmlspecialchars($selected_zip_code); ?>" readonly></label>
                    <?php else: ?>
                        <label>Zip Code:
                            <select name="zip_code" required>
                                <option value="10000">10000 - Prishtinë</option>
                                <option value="20000">20000 - Prizren</option>
                                <option value="50000">50000 - Mitrovicë</option>
                            </select>
                        </label>
                    <?php endif; ?>
                    <label>Country:<input type="text" name="country" value="<?php echo htmlspecialchars($_POST['country'] ?? ''); ?>" required></label>
                </div>
                <label><input type="checkbox" name="ship_to_same_address" checked> Ship to the same address</label>
            </div>

            <div class="checkout-section">
                <h2 class="section-title">2. Shipping Method</h2>
                <label><input type="radio" name="shipping_method" value="Free Shipping" checked> Free Shipping ($0)</label>
                <label><input type="radio" name="shipping_method" value="EMS"> EMS (Express Mail Service) $18</label>

                <h2 class="section-title">3. Payment Method</h2>
                <label><input type="radio" name="payment_method" value="PayPal" checked> PayPal</label>
                <label><input type="radio" name="payment_method" value="Credit Card"> Credit Card</label>

                <div id="card-details" style="display: none;">
                    <label>Card Number:<input type="text" name="card_number" placeholder="1234 5678 9012 3456"></label>
                    <label>Expiry Date:<input type="month" name="expiry_date"></label>
                    <label>CVV:<input type="text" name="cvv" placeholder="123"></label>
                </div>
            </div>

            <div class="checkout-section">
                <h2 class="section-title">4. Review Your Order</h2>
                <?php foreach ($cartItems as $item): ?>
                <div class="order-item">
                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                    <p><strong>Product:</strong> <?php echo htmlspecialchars($item['name']); ?></p>
                    <p><strong>Quantity:</strong> <?php echo htmlspecialchars($item['quantity']); ?></p>
                    <p><strong>Subtotal:</strong> $<?php echo number_format($item['price'] * $item['quantity'], 2); ?></p>
                    <input type="hidden" name="products[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>">
                    <input type="hidden" name="products[<?php echo $item['id']; ?>][name]" value="<?php echo htmlspecialchars($item['name']); ?>">
                    <input type="hidden" name="products[<?php echo $item['id']; ?>][image]" value="<?php echo htmlspecialchars($item['image']); ?>">
                    <input type="hidden" name="products[<?php echo $item['id']; ?>][quantity]" value="<?php echo $item['quantity']; ?>">
                    <input type="hidden" name="products[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>">
                </div>
            <?php endforeach; ?>


                <p><strong>Shipping:</strong> <span id="shipping-cost">$0.00</span></p>
                <p><strong>Grand Total:</strong> <span id="grand-total">$<?php echo number_format($total, 2); ?></span></p>
                <label>Comments:<textarea name="comments"></textarea></label>
                <label><input type="checkbox" name="terms" required> I accept the Terms and Conditions</label>
            </div>

            <button type="submit" class="place-order-btn">Place Order Now</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
        const cardDetails = document.getElementById('card-details');

    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'Credit Card') {
                cardDetails.style.display = 'block';
            } else {
                cardDetails.style.display = 'none';
            }
        });
    });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (cart.length > 0) {
        fetch('sync_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(cart)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Cart synced successfully.');
            } else {
                console.error('Cart sync failed.');
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
   
    if (!window.location.search.includes('refreshed=true')) {
     
        const currentUrl = window.location.href;
        const separator = currentUrl.includes('?') ? '&' : '?';
        const newUrl = currentUrl + separator + 'refreshed=true';
        window.location.replace(newUrl);
    }
});

    </script>
</body>
</html>