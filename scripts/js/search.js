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
      const data = JSON.parse(xhr.response);
      let dataHtml = ``;
      if (typeof data == "object") {
        // calling a function to highlight the search term from the result
        dataHtml = highliter(term, data);
      } else {
        dataHtml = `<p>No results matching \"${term}\" !</p>`;
      }
      results.innerHTML = dataHtml;
      results.classList.remove("hidden");
    };
  }
};

// highlighting the result search term
function highliter(term, ...data) {
  const re = new RegExp(term, "g");
  let newHtml = ``;
  for (let i = 0; i < data.length; i++) {
    data[i].forEach((k) => {
      const highlited = k.replace(re, `<mark>${term}</mark>`);
      newHtml += `<div class="item"><a>${highlited}</a></div>`;
    });
  }
  return newHtml;
}

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
