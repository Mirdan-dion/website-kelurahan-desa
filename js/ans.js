document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".struktur-card");
  cards.forEach((card) => {
    card.addEventListener("mouseenter", () => {
      card.style.transform = "scale(1.1)";
    });
    card.addEventListener("mouseleave", () => {
      card.style.transform = "scale(1)";
    });
  });
});
