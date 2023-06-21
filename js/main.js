const cards = document.querySelectorAll(".author-card");
const details = document.querySelectorAll(".author-details__container");
const placeholder = document.querySelector(".author-details__placeholder");

for (const card of cards) {
  card.addEventListener("click", (event) => {
    if (event.currentTarget.classList.contains("author-card--active")) {
      clearCards();
      clearDetails();
      placeholder.classList.add("author-details__container--active");
    } else {
      clearCards();
      clearDetails();
      event.currentTarget.classList.add("author-card--active");
      showDetail(event.currentTarget.dataset.id);
    }
  });
}

// remove author-card--active class from all cards
function clearCards() {
  for (const card of cards) {
    card.classList.remove("author-card--active");
  }
}

function clearDetails() {
  for (const detail of details) {
    detail.classList.remove("author-details__container--active");
  }
}

function showDetail(id) {
  for (const detail of details) {
    if (detail.dataset.id == id) {
      detail.classList.add("author-details__container--active");
    }
  }
}
