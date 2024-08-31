const form = document.querySelector(".js-form"),
  loader = form.querySelector(".loader"),
  overlay = form.querySelector(".overlay"),
  submitBtn = form.querySelector("input[type='submit']"),
  error = form.querySelector(".error");

form.onsubmit = (e) => {
  e.preventDefault();
};

submitBtn.onclick = () => {
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../scripts/backend/recover.php", true);
  xhr.send(formData);
  loading();
  xhr.onload = () => {
    doneLoading();
    const data = xhr.response;
    if (data === "success") {
      alert("Check your inbox for a reset password link!!");
    } else {
      error.innerHTML = data;
      error.classList.add("active");
    }
  };
};

function loading() {
  overlay.classList.remove("hidden");
  loader.classList.remove("hidden");
}
function doneLoading() {
  overlay.classList.add("hidden");
  loader.classList.add("hidden");
}
