function toggleMenu() {
    
    if (window.innerWidth <= 768) {
      const navLinks = document.getElementById("navLinks");
      navLinks.classList.toggle("active"); 
    }
  }
  