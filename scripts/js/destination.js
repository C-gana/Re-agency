const prev = document.querySelector(".preview .left"),
  previewBox = document.querySelector(".preview"),
  previewImg = previewBox.querySelector("img"),
  next = document.querySelector(".preview .right"),
  imgs = document.querySelectorAll(".img-grid img"),
  overlay = document.querySelector(".overlay");

window.onload = () => {
  for (let i = 0; i < imgs.length; i++) {
    imgs[i].onclick = () => {
      function preview() {
        const selectedImgurl = imgs[i].src;
        previewImg.src = selectedImgurl;
        previewBox.classList.add("show");
        overlay.classList.remove("hidden");
        const closeBtn = document.querySelector(".close");
        closeBtn.onclick = () => {
          overlay.classList.add("hidden");
          previewBox.classList.remove("show");
        };
      }
      preview();
    };
  }
};
