const searchInput = document.querySelector(".js-search-input");
const searchBtn = document.querySelector(".js-search-button");
let keyword = "";
searchInput.addEventListener("keyup", (e) => {
  const xhr = new XMLHttpRequest();
  const keyword = searchInput.value;
  if (keyword) {
    xhr.open("GET", `scripts/main.php?key=${keyword}`, true);
    xhr.onload = () => {
      if (xhr.status === 200) {
        const response = xhr.response;
        document.querySelector(".result").innerHTML = response;
        document.querySelector(".result").style = "display:block";
      }
    };
    xhr.send();
  } else {
    document.querySelector(".result").innerHTML = "";
    document.querySelector(".result").style = "display:none";
  }
});
