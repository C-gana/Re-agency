const previewBox = document.querySelector(".preview"),
  previewImg = previewBox.querySelector("img"),
  imgs = document.querySelectorAll(".img-grid img"),
  overlay = document.querySelector(".overlay");

window.onload = () => {
  // Looping through all the images after window has finished loading------------------------------------------------------
  for (let i = 0; i < imgs.length; i++) {
    let newIndex = i;
    const next = document.querySelector(".preview .next"),
      prev = document.querySelector(".preview .prev");
    imgs[i].onclick = () => {
      function preview() {
        //opening the clicked image preview-------------------------------------------------
        const selectedImgurl = imgs[newIndex].src;
        previewImg.src = selectedImgurl;
        previewBox.classList.add("show");
        overlay.classList.remove("hidden");
        const closeBtn = document.querySelector(".close");
        closeBtn.onclick = () => {
          overlay.classList.add("hidden");
          previewBox.classList.remove("show");
        };
        // cleaning the prev and next button if the index is out of range-------------------------------------------------
        if (newIndex == 0) {
          prev.classList.add("hidden");
        } else {
          prev.classList.remove("hidden");
        }
        if (newIndex >= 5) {
          next.classList.add("hidden");
        } else {
          next.classList.remove("hidden");
        }
      }
      preview();
      // showing the previous image on click---------------------------------------------------------------------------------
      prev.onclick = () => {
        if (newIndex == 0) {
          prev.classList.add("hidden");
        } else {
          newIndex--;
          preview();
        }
      };
      // showing the next image on click---------------------------------------------------------------------------------
      next.onclick = () => {
        if (newIndex == 5) {
          next.classList.add("hidden");
        } else {
          newIndex++;
          preview();
        }
      };
    };
  }
};
