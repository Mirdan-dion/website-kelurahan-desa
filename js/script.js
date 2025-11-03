// JavaScript untuk interaksi tambahan jika diperlukan
document.addEventListener("DOMContentLoaded", function () {
  // Contoh: Menambahkan event listener atau fungsi lainnya
  const deleteButtons = document.querySelectorAll(".delete-btn");
  deleteButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      if (!confirm("Apakah Anda yakin ingin menghapus program ini?")) {
        event.preventDefault();
      }
    });
  });
});

// Toggle class active untuk navbar
const navbarNav = document.querySelector(".navbar-nav");
const hamburgerMenu = document.querySelector("#hamburger-menu");

// Event klik untuk buka/tutup menu
hamburgerMenu.addEventListener("click", () => {
  navbarNav.classList.toggle("active");
});

// Klik di luar menu untuk nutup navbar
document.addEventListener("click", (e) => {
  if (!hamburgerMenu.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

function showContent(type) {
  const contents = document.querySelectorAll(".content");
  contents.forEach((content) => (content.style.display = "none"));

  const selectedContent = document.getElementById(type);
  if (selectedContent) {
    selectedContent.style.display = "block";
  }
}
