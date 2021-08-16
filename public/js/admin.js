const showMenu = (button, elem) => {
    const toggleBtn = document.getElementById(button);
    const nav = document.getElementById(elem);
  
    if (toggleBtn && nav) {
      toggleBtn.addEventListener("click", () => {
        nav.classList.toggle("show-menu");
  
        toggleBtn.classList.toggle("bx-x");
      });
    }
  };
  
  showMenu("header-toggle", "navbar");
  
  // link
  const linkColor = document.querySelectorAll(".nav__link");
  
  function colorLink() {
    linkColor.forEach((l) => l.classList.remove("active"));
    this.classList.add("active");
  }
  
  linkColor.forEach((l) => l.addEventListener("click", colorLink));

//   

