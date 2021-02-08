function mobileToggle() {
    let container = document.getElementById("menu-mobile-container");
    let navIcon = document.getElementById("nav-icon");
    let closeIcon = document.getElementById("close-icon");
    if (container.style.display === "flex") {
        container.style.display = "none";
        navIcon.style.display = "block";
        closeIcon.style.display = "none";
    } else {
        container.style.display = "flex";
        navIcon.style.display = "none";
        closeIcon.style.display = "block";
    }
  }

  jQuery( window ).resize(function() {
    let container = document.getElementById("menu-mobile-container");
    let navIcon = document.getElementById("nav-icon");
    let closeIcon = document.getElementById("close-icon");
    
    if(jQuery(this).width() > 800 ) {
        navIcon.style.display = "none";  
        container.style.display = "none";
        closeIcon.style.display = "none";
    } else {        
        navIcon.style.display = "block";
        container.style.display = "none";
        closeIcon.style.display = "none";
    }
  });