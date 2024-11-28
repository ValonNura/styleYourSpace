function toggleForm() {
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");

  loginForm.classList.toggle("hidden");
  signupForm.classList.toggle("hidden");
}

function validateLogin() {
  const email = document.getElementById("loginEmail").value;
  const password = document.getElementById("loginPassword").value;

  if (!email || !password) {
    alert("Please fill out all fields.");
    return false;
  }

  // Updated email regex to ensure domain suffix like .com or .net
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
  const name = document.getElementById("signupName").value;
  const email = document.getElementById("signupEmail").value;
  const password = document.getElementById("signupPassword").value;
  const confirmPassword = document.getElementById(
    "signupConfirmPassword"
  ).value;

  if (!name || !email || !password || !confirmPassword) {
    alert("Please fill out all fields.");
    return false;
  }

  // Updated email regex to ensure domain suffix like .com or .net
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
