const closeBtn = document.querySelector(".close"),
  cards = document.querySelectorAll(".card"),
  updForm = document.querySelector(".update-form"),
  updBtn = updForm.querySelector("input[type='submit']"),
  btns = document.querySelectorAll(".reservations button"),
  overlay = document.querySelector(".overlay"),
  xhr = new XMLHttpRequest();

updForm.onsubmit = (e) => {
  e.preventDefault();
};

const handleEdit = () => {
  remHidden("edit");
  updBtn.onclick = () => {
    const formData = new FormData(updForm);
    xhr.open("POST", "../scripts/backend/updTrip.php", true);
    xhr.send(formData);
    xhr.onload = () => {
      const data = xhr.response;
      console.log(data);
      // if (data === "success") {
      //   location.href = "home.php";
      // } else {
      //   error.textContent = data;
      //   error.classList.add("active");
      // }
    };
  };
};
const handleCancel = () => {
  console.log("cancel clicked");
};

// onclick event on edit and cancel buttons-----------------------------------------------------
btns.forEach(
  (btn) =>
    (btn.onclick = () =>
      btn.classList.contains("edit") ? handleEdit() : handleCancel())
);

// closing any open card---------------------------------------------------------------------
closeBtn.onclick = () => {
  overlay.classList.add("hidden");
  cards.forEach((card) => {
    if (!card.classList.contains("hidden")) {
      card.classList.add("hidden");
    }
  });
};
// showing the offer card and the overlay-----------------------------------------------------------
function remHidden(cardClass) {
  cards.forEach((card) => {
    if (card.classList.contains(`${cardClass}`)) {
      card.classList.remove("hidden");
    }
  });
  overlay.classList.remove("hidden");
}
