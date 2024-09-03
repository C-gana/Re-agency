const form = document.querySelector(".js-form"),
  submitBtn = form.querySelector("input[type='submit']"),
  error = form.querySelector(".error"),
  msg = form.querySelector(".msg");

form.onsubmit = (e) => {
  e.preventDefault();
};

submitBtn.onclick = () => {
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../scripts/backend/verify.php", true);
  xhr.send(formData);
  xhr.onload = () => {
    const data = xhr.response;
    if (data === "success") {
      location.href = "reset.php";
    } else {
      msg.classList.remove("active");
      error.innerHTML = data;
      error.classList.add("active");
    }
  };
};
