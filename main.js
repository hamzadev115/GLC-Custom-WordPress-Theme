const menuToggle = document.querySelector(".menu-toggle");
const menu = document.querySelector(".menu");

menuToggle.addEventListener("click", () => {
  menu.classList.toggle("active");
  menuToggle.classList.toggle("active");

  // Toggle between bars and close icon
  if (menuToggle.classList.contains("active")) {
    menuToggle.innerHTML = '<i class="fa-solid fa-xmark"></i>';
  } else {
    menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
  }
});
