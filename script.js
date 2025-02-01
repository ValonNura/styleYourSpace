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

  return true;
}

function filterProducts(category) {
  const products = document.querySelectorAll(".product");
  const buttons = document.querySelectorAll(".filter-btn");


  buttons.forEach((btn) => {
    if (btn.getAttribute("data-filter") === category) {
      btn.classList.add("active");
    } else {
      btn.classList.remove("active");
    }
  });


  if (category === "all" || category === "bestseller" || category === "sale") {
    document.getElementById("categorySelect").value = "all";
  }

  
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


function filterByCategory(category) {
  const categories = document.querySelectorAll(".category");

  categories.forEach((section) => {
      const sectionCategory = section.getAttribute("id");
      if (category === "all") {
          section.style.display = "block";
      } else if (sectionCategory === category) {
          section.style.display = "block";
      } else {
          section.style.display = "none";
      }
  });
}


function sortProducts(sortType) {
  const categorySections = document.querySelectorAll('.category'); 

  categorySections.forEach(section => {
      const productsContainer = section.querySelector('.products'); 
      if (!productsContainer) return;

      const products = Array.from(productsContainer.getElementsByClassName('product'));

      products.sort((a, b) => {
          switch (sortType) {
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

      productsContainer.innerHTML = '';
      products.forEach(product => {
          productsContainer.appendChild(product);
      });
  });
}


function getPrice(productElement) {
  const priceElement = productElement.querySelector('.price'); 
  if (!priceElement) return 0; 
  const priceText = priceElement.textContent.replace('$', '').trim();
  return parseFloat(priceText);
}


function getName(productElement) {
    return productElement.querySelector('h4').textContent.trim();
}

document.addEventListener("DOMContentLoaded", function () {
  
  const filterButtons = document.querySelectorAll(".filter-btn");
  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const category = this.getAttribute("data-filter");
      filterProducts(category);
    });
  });

  const categorySelect = document.getElementById("categorySelect");
  if (categorySelect) {
    categorySelect.addEventListener("change", function () {
      console.log("Filtering by category:", this.value);
      filterByCategory(this.value);
    });
  }

  
  const sortSelect = document.getElementById("sort-select");
  if (sortSelect) {
    sortSelect.addEventListener("change", function () {
      sortProducts(this.value);
    });
  }

  filterByCategory("all"); 

  if (sortSelect) {
    sortProducts(sortSelect.value);
  }
});

function toggleMenu() {
  const navLinks = document.getElementById('navLinks');
  navLinks.classList.toggle('active');
}

const hamburger = document.getElementById('hamburger-icon');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
