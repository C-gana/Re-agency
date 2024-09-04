const form = document.querySelector(".search-container"),
  searchInput = form.querySelector(".js-search-input input"),
  results = form.querySelector(".results"),
  nav = document.querySelector(".nav");

searchInput.onkeyup = () => {
  const term = searchInput.value;
  const xhr = new XMLHttpRequest();
  if (term === "") {
    results.classList.add("hidden");
  } else {
    xhr.open("POST", "../scripts/backend/search.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("term=" + term);
    xhr.onload = () => {
      const data = xhr.response;
      results.innerHTML = data;
      results.classList.remove("hidden");
    };
  }
};
// listening on input to check if its not focused
searchInput.onblur = () => {
  searchInput.value = "";
  results.classList.add("hidden");
};
// handling the navigation bar
window.onscroll = () => {
  const scrollPos = window.scrollY;
  if (scrollPos > 10) {
    nav.classList.add("stick");
  }
  if (scrollPos < 10) {
    nav.classList.remove("stick");
  }
};
