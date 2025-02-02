<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Interior Design Blog</title>
  <link rel="stylesheet" href="css/blog.css" />
  <script src="script.js"></script>
</head>

<body>
  <section class="header">
    <?php session_start(); ?>
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
        </ul>
      </div>
    </nav>

  </section>

  <main>
    <section class="hero">
      <div class="container">
        <h1>Welcome to Our Interior Design Blog</h1>
        <p>
          Discover tips, trends, and inspiration to create your perfect space.
        </p>
      </div>
    </section>

    <div class="container">
      <section class="blog-posts">
        <div class="container">
          <h2>Latest Blog Posts</h2>
          <div class="posts">
            <article class="post">
              <img src="img/living/artikulli1.jpg" alt="Modern Living Room" />
              <h3>Top 5 Modern Living Room Trends</h3>
              <p>Explore the latest styles and ideas for transforming your living space.</p>
              <a href="article-template.php?id=1" class="read-more">Read More</a>
            </article>

            <article class="post">
              <img src="img/living/artikulli2.jpg" alt="Cozy Bedroom" />
              <h3>Creating a Cozy Bedroom Retreat</h3>
              <p>Tips and tricks for designing the perfect relaxing sanctuary.</p>
              <a href="article-template.php?id=2" class="read-more">Read More</a>
            </article>

            <article class="post">
              <img src="img/living/artikulli3.jpg" alt="Cozy Bedroom" />
              <h3>Creating a Cozy Bedroom Retreat</h3>
              <p>Tips and tricks for designing the perfect relaxing sanctuary.</p>
              <a href="article-template.php?id=3" class="read-more">Read More</a>
            </article>
            
            

          </div>
        </div>
      </section>
    </div>
  </main>


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
        <form class="newsletter" id="subscribeForm">
          <input type="email" name="email" id="email" placeholder="Enter your email" required />
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2024 Style Your Space. All rights reserved.</p>
    </div>
  </section>


  <script>
    document.getElementById("subscribeForm").addEventListener("submit", function (event) {
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

</body>

</html>