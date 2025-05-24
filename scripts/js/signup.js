const form = document.querySelector(".js-sign-form"),
  submitBtn = form.querySelector("input[type='submit']"),
  error = form.querySelector(".error");

form.onsubmit = (e) => {
  e.preventDefault();
};

submitBtn.onclick = () => {
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../scripts/backend/signup.php", true);

  xhr.onload = () => {
    const data = xhr.response;
    if (data === "success") {
      location.href = "login.php";
    } else {
      error.textContent = data;
      error.classList.add("active");
    }
  };
  xhr.send(formData);
};

// toggling pwd fields show and hide
const togglePwd = document.querySelectorAll(".pwd i");
togglePwd.forEach((i) => {
  i.onclick = () => {
    const input = i.parentNode.querySelector("input");
    if (input.type === "password") {
      input.type = "text";
      i.classList.add("active");
    } else {
      input.type = "password";
      i.classList.remove("active");
    }
  };
});
