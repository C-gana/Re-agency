const pwdField = document.querySelector(".js-form input[type='password']");
const togglePwd = document.querySelector(".js-form i");

togglePwd.onclick = () => {
  if (pwdField.type == "password") {
    pwdField.type = "text";
    togglePwd.classList.add("active");
  } else {
    pwdField.type = "password";
    togglePwd.classList.remove("active");
  }
};
