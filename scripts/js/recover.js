const form = document.querySelector(".js-form"),
  submitBtn = form.querySelector("input[type='submit']"),
  error = form.querySelector(".error");

form.onsubmit = (e) => {
  e.preventDefault();
};

submitBtn.onclick = () => {
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../scripts/backend/recover_local.php", true);
  xhr.send(formData);

  xhr.onload = () => {
    const data = xhr.response;
    if (data === "success") {
      alert("Check your inbox for a reset password link!!");
    } else {
      error.textContent = data;
      error.classList.add("active");
    }
  };
};
