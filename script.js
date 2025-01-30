function toggleForm() {
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");

  loginForm.classList.toggle("hidden");
  signupForm.classList.toggle("hidden");
}

function validateLogin() {
  const email = document.getElementById("loginEmail").value.trim();
  const password = document.getElementById("loginPassword").value.trim();

  if (!email || !password) {
    alert("Please fill out all fields.");
    return false;
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email (e.g., example@domain.com).");
    return false;
  }

  if (password.length < 8) {
    alert("Password must be at least 8 characters long.");
    return false;
  }

  alert("Login successful!");
  return true;
}

function validateSignup() {
  const name = document.getElementById("signupName").value.trim();
  const email = document.getElementById("signupEmail").value.trim();
  const password = document.getElementById("signupPassword").value.trim();
  const confirmPassword = document
    .getElementById("signupConfirmPassword")
    .value.trim();

  if (!name || !email || !password || !confirmPassword) {
    alert("Please fill out all fields.");
    return false;
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.(com|net|org|edu|gov)$/;
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email (e.g., example@domain.com).");
    return false;
  }

  const passwordRegex = /^(?=.*[A-Z]).{8,}$/;
  if (!passwordRegex.test(password)) {
    alert(
      "Password must be at least 8 characters long and include at least one uppercase letter."
    );
    return false;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  alert("Signup successful!");
  return true;
}

function toggleMenu() {
  if (window.innerWidth <= 768) {
    const navLinks = document.getElementById("navLinks");
    navLinks.classList.toggle("active");
  }
}

// ----------------------------------------------------------------------
// Filtering products

function filterProducts(category) {
  const products = document.querySelectorAll(".product");
  const buttons = document.querySelectorAll(".filter-btn");

  // Update active button
  buttons.forEach((btn) => {
    if (btn.getAttribute("data-filter") === category) {
      btn.classList.add("active");
    } else {
      btn.classList.remove("active");
    }
  });

  // Reset category dropdown if using filter buttons
  if (category === "all" || category === "bestseller" || category === "sale") {
    document.getElementById("categorySelect").value = "all";
  }

  // Filter products
  products.forEach((product) => {
    if (category === "all") {
      product.style.display = "block";
    } else if (category === "bestseller") {
      if (product.querySelector(".bestseller-label")) {
        product.style.display = "block";
      } else {
        product.style.display = "none";
      }
    } else if (category === "sale") {
      if (product.querySelector(".old-price")) {
        product.style.display = "block";
      } else {
        product.style.display = "none";
      }
    } else {
      const productCategory = product.getAttribute("data-category");
      if (productCategory === category) {
        product.style.display = "block";
      } else {
        product.style.display = "none";
      }
    }
  });
}

// Function for category dropdown filtering
function filterByCategory(category) {
  const products = document.querySelectorAll(".product");

  products.forEach((product) => {
    const productCategory = product.getAttribute("data-category");

    if (category === "all" || productCategory === category) {
      product.style.display = "block";
    } else {
      product.style.display = "none";
    }
  });
}

// Sorting function
function sortProducts(sortType) {
    const productsContainer = document.querySelector('.products');
    const products = Array.from(productsContainer.getElementsByClassName('product'));

    products.sort((a, b) => {
        switch(sortType) {
            case 'price-asc':
                return getPrice(a) - getPrice(b);
            case 'price-desc':
                return getPrice(b) - getPrice(a);
            case 'name-asc':
                return getName(a).localeCompare(getName(b));
            case 'name-desc':
                return getName(b).localeCompare(getName(a));
            default:
                return 0;
        }
    });

    // Clear and re-append sorted products
    productsContainer.innerHTML = ''; 
    products.forEach(product => {
        productsContainer.appendChild(product);
    });
}

// Helper function to get the price value
function getPrice(productElement) {
    const priceText = productElement.querySelector('.price').textContent;
    const price = priceText.replace('$', '').trim();
    return parseFloat(price);
}

// Helper function to get the name value
function getName(productElement) {
    return productElement.querySelector('h4').textContent.trim();
}

// Event Listeners for Filters and Sorting
document.addEventListener("DOMContentLoaded", function () {
  // Filter buttons
  const filterButtons = document.querySelectorAll(".filter-btn");
  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const category = this.getAttribute("data-filter");
      filterProducts(category);
    });
  });

  // Category dropdown filter
  const categorySelect = document.getElementById("categorySelect");
  if (categorySelect) {
    categorySelect.addEventListener("change", function () {
      console.log("Filtering by category:", this.value);
      filterByCategory(this.value);
    });
  }

  // Sorting dropdown event listener
  const sortSelect = document.getElementById("sort-select");
  if (sortSelect) {
    sortSelect.addEventListener("change", function () {
      sortProducts(this.value);
    });
  }

  // Apply initial filters on page load
  filterByCategory("all"); 
  sortProducts(document.getElementById("sort-select").value);
});

// Toggle menu function for responsive navigation
function toggleMenu() {
  const navLinks = document.getElementById('navLinks');
  navLinks.classList.toggle('active');
}

const hamburger = document.getElementById('hamburger-icon');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
