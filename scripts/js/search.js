const form = document.querySelector(".search-container"),
  searchInput = form.querySelector(".js-search-input"),
  searchBtn = form.querySelector(".js-search-button"),
  result = form.querySelector(".result");

searchInput.onkeyup = () => {
  const term = searchInput.value;
  const xhr = new XMLHttpRequest();
  if (term === "") {
    result.style.display = "none";
  } else {
    xhr.open("POST", "scripts/backend/search.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("term=" + term);
    xhr.onload = () => {
      const data = xhr.response;
      result.innerHTML = data;
      result.style.display = "block";
    };
  }
};
