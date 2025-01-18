<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Style Your Space</title>
    <link rel="stylesheet" href="css/contactus.css" />
    <link rel="icon" href="img/favicon-32x32.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
  </head>
  <body>
    <section class="header">
      <nav>
        <div class="nav-links" id="navLinks">
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="SignIn.php">Sign in</a></li>
          </ul>
        </div>
      
      </nav>
      <div class="text-box">
        <h1>Contact Us</h1>
      </div>
    </section>

    <section class="contact-us">
      <div class="contact-container">
       <div class="contact-form">
          <h1>Contact Us</h1>
       <p>
        We’d love to hear from you! Fill out the form below to get in touch.
      </p>
      <form action="contact.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required />
        <input type="email" name="email" placeholder="Your Email" required />
        <textarea
          name="message"
          rows="5"
          placeholder="Your Message"
          required
        ></textarea>
        <button type="submit">Send Message</button>
      </form>
    </div>

    
    <div class="contact-info">
      <h1>Get in Touch</h1>
      <p>Reach out through the following channels:</p>
      <ul>
        <li>
          <i class="fas fa-envelope"></i> Email: support@styleyourspace.com
        </li>
        <li><i class="fas fa-phone"></i> Phone: +383 49 123 456</li>
        <li>
          <i class="fas fa-map-marker-alt"></i> Address: Prishtinë, Kosovo
        </li>
      </ul>
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3030.784073048935!2d21.1655035!3d42.6629145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ecf57e1c2ed%3A0xf013a4b176d4a810!2sPristina%2C%20Kosovo!5e0!3m2!1sen!2s!4v1607250184847!5m2!1sen!2s"
          width="100%"
          height="200"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
        >
        </iframe>
      </div>
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
          <form class="newsletter" action="#">
            <input type="email" placeholder="Enter your email" required />
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>
      <p>&copy; 2024 Style Your Space. All rights reserved.</p>
    </section>

   
    <script>
      function toggleMenu() {
        const navLinks = document.getElementById("navLinks");
        navLinks.classList.toggle("active");
      }
    </script>
  </body>
</html>
