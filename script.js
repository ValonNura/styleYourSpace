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

// filter of products

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
    }
    // Handle category filtering
    else {
      const productCategory = product.getAttribute("data-category");
      if (productCategory === category) {
        product.style.display = "block";
      } else {
        product.style.display = "none";
      }
    }
  });
}

// Function for category dropdown
function filterByCategory(category) {
  console.log("Selected category:", category); // Debug log

  // Reset active state of filter buttons when using dropdown
  document.querySelectorAll(".filter-btn").forEach((btn) => {
    btn.classList.remove("active");
  });

  const products = document.querySelectorAll(".product");
  console.log("Total products found:", products.length); // Debug log

  products.forEach((product) => {
    const productCategory = product.getAttribute("data-category");
    console.log("Product category:", productCategory); // Debug log

    if (category === "all") {
      product.style.display = "block";
    } else if (productCategory === category) {
      product.style.display = "block";
      console.log("Showing product:", product); // Debug log
    } else {
      product.style.display = "none";
    }
  });
}

// Add event listeners when document is loaded
document.addEventListener("DOMContentLoaded", function () {
  // Filter buttons event listeners
  const filterButtons = document.querySelectorAll(".filter-btn");
  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const category = this.getAttribute("data-filter");
      filterProducts(category);
    });
  });

  // Category dropdown event listener
  const categorySelect = document.getElementById("categorySelect");
  if (categorySelect) {
    categorySelect.addEventListener("change", function () {
      console.log("Dropdown changed to:", this.value); // Debug log
      filterByCategory(this.value);
    });
  }

  // Show all products by default
  filterProducts("all");
});


