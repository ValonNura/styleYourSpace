<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="icon" href="img/favicon-32x32.png" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <title>Style Your Space</title>
  </head>
  <body>
    <section class="header">
      <nav>
       
        <div class="nav-links" id="navLinks">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contactus.php">Contact us</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="SignIn.php">Sign in</a></li>
          </ul>
        </div>
      </nav>
    </section>
    

    <div class="slick-container">
      <div class="slider-item">
        <img src="img/h8.png" alt="" />
        <div class="slider-content">
          <h1>Welcome to Style Your Space</h1>
          <p>Discover stunning interiors and unique ideas</p>
          <a href="products.html"><button>Our best sellers</button></a>
        </div>
      </div>
      <div class="slider-item">
        <img src="img/home2.webp" alt="" />
        <div class="slider-content">
          <h1>Transform your space</h1>
          <p>With the best designs tailored for you</p>
          <a href="products.html"><button>Our best sellers</button></a>
        </div>
      </div>
      <div class="slider-item">
        <img src="img/home1.png" alt="" />
        <div class="slider-content">
          <h1>The perfect interior</h1>
          <p>We create dreams into reality</p>
          <a href="products.html"><button>Our best sellers</button></a>
        </div>
      </div>
    </div>

    <section class="section-featured">
      <div class="container">
        <h2 class="heading-featured-in">As featured in</h2>
        <div class="logos">
          <img src="img/logos/techcrunch.png" alt="Techcrunch logo" />
          <img
            src="img/logos/business-insider.png"
            alt="Business Insider logo"
          />
          <img
            src="img/logos/the-new-york-times.png"
            alt="The New York Times logo"
          />
          <img src="img/logos/forbes.png" alt="Forbes logo" />
          <img src="img/logos/usa-today.png" alt="USA Today logo" />
        </div>
      </div>
    </section>

    <section class="under-slider">
      <div class="background-container">
        <div class="order-furniture">
          <h1>Ready to order the best furniture?</h1>
          <a href="SignIn.html">
            <button
              class="discount"
              type="button"
              aria-label="Get a 50% discount by signing up"
            >
              Get a 50% discount
            </button>
          </a>
          <p>Sign up now to get 50% off your order!</p>
          <p class="testimonial">
            "The best furniture deals in town!" - Happy Customer
          </p>
        </div>
      </div>
    </section>

    <section class="services">
      <h2>Our Services</h2>
      <div class="services-grid">
        <div class="service-card">
          <i class="fas fa-truck"></i>
          <h3>Free Delivery</h3>
          <p>Free shipping on orders over $500</p>
        </div>
        <div class="service-card">
          <i class="fas fa-tools"></i>
          <h3>Assembly Service</h3>
          <p>Professional furniture assembly</p>
        </div>
        <div class="service-card">
          <i class="fas fa-exchange-alt"></i>
          <h3>Easy Returns</h3>
          <p>30-day hassle-free returns</p>
        </div>
        <div class="service-card">
          <i class="fas fa-couch"></i>
          <h3>Custom Design</h3>
          <p>Personalized furniture solutions</p>
        </div>
        <div class="service-card">
          <i class="fas fa-shield-alt"></i>
          <h3>Warranty</h3>
          <p>5-year warranty on all products</p>
        </div>
        <div class="service-card">
          <i class="fas fa-headset"></i>
          <h3>24/7 Support</h3>
          <p>Round-the-clock customer service</p>
        </div>
        <div class="service-card">
          <i class="fas fa-paint-brush"></i>
          <h3>Interior Design</h3>
          <p>Professional design consultation</p>
        </div>
        <div class="service-card">
          <i class="fas fa-hand-holding-usd"></i>
          <h3>Flexible Payment</h3>
          <p>Multiple payment options available</p>
        </div>
      </div>
    </section>

    <section class="footer">
      <div class="footer-boxes">
        <div class="footer-box">
          <h4>Stay connected with us</h4>
          <p>
            Follow us on social media for the latest updates, inspiration, and
            more!
          </p>
          <div class="icons">
            <a
              href="https://facebook.com"
              target="_blank"
              aria-label="Visit our Facebook page"
            >
              <i class="fab fa-facebook"></i>
            </a>
            <a
              href="https://instagram.com"
              target="_blank"
              aria-label="Visit our Instagram page"
            >
              <i class="fab fa-instagram"></i>
            </a>
            <a
              href="https://linkedin.com"
              target="_blank"
              aria-label="Visit our LinkedIn page"
            >
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
      </div>
      <p>&copy; 2024 Style Your Space. All rights reserved.</p>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".slick-container").slick({
          autoplay: true,
          autoplaySpeed: 2000,
          speed: 1000,
          infinite: true,
          arrows: true,
          dots: false,
          pauseOnHover: false,
          cssEase: "linear",
          prevArrow:
            '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
          nextArrow:
            '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
        });
      });
    </script>
    <script>
    $(document).ready(function() {
       
        $('.service-card').hover(
            function() {
                $(this).css({
                    'transform': 'scale(1.05)',
                    'box-shadow': '0 10px 20px rgba(0,0,0,0.2)',
                    'transition': 'all 0.3s ease'
                });
            },
            function() {
                $(this).css({
                    'transform': 'scale(1)',
                    'box-shadow': 'none',
                    'transition': 'all 0.3s ease'
                });
            }
        );

       
        $('.service-card').click(function() {
           
            const card = $(this);
            
           
            const serviceTitle = card.find('h3').text();
            
           
            const serviceDetails = {
                'Free Delivery': 'We offer complimentary delivery for orders above $500. Delivery usually takes 3-5 business days.',
                'Assembly Service': 'Our professional team will assemble your furniture with care and precision.',
                'Easy Returns': 'Don\'t love it? Return within 30 days for a full refund.',
                'Custom Design': 'Work with our designers to create your perfect piece.',
                'Warranty': 'All products come with a comprehensive 5-year warranty.',
                '24/7 Support': 'Our customer service team is always here to help.',
                'Interior Design': 'Get expert advice from our certified interior designers.',
                'Flexible Payment': 'Choose from various payment plans including installments.'
            };

           
            alert(`${serviceTitle}\n\n${serviceDetails[serviceTitle]}`);
        });
    });
    </script>
  </body>
</html>
