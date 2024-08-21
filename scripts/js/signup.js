const form = document.querySelector(".js-sign-form"),
  submitBtn = form.querySelector("input[type='submit']"),
  error = form.querySelector(".error");

form.onsubmit = (e) => {
  e.preventDefault();
};

submitBtn.onclick = () => {
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "scripts/backend/signup.php", true);
  xhr.send(formData);

  xhr.onload = () => {
    const data = xhr.response;
    if (data === "success") {
      location.href = "login.php";
    } else {
      error.textContent = data;
      error.classList.add("active");
    }
  };
};
