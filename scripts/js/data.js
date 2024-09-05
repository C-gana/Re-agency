// services data
const services = [
  {
    title: "Booking Tickets",
    desc: "Booking a ticket for your next holiday journey has never been easier",
    img: "booking-service.jpg",
  },
  {
    title: "Documents",
    desc: "We'll help you with any visas or documents along the way...",
    img: "document-service.webp",
  },
  {
    title: "Travel Insurance",
    desc: "We  can supply you with necessary medical insurance accross the globe ",
    img: "insurance-service.png",
  },
  {
    title: "Planning Tours",
    desc: "Whatever your dream destination is, we'll plan your next vacation easily",
    img: "planning-service.jpg",
  },
];

// offers data
const offers = [
  {
    destination: "Likoma Island",
    discount: "10",
    desc: "3 Days Adventure",
    img: "likoma.jpg",
    id: "01",
    fee: "20",
  },
  {
    destination: "Mulanje Mountain",
    discount: "20",
    desc: "7 Days Hiking Expedition",
    img: "mulanje.jpg",
    id: "02",
    fee: "20",
  },
  {
    destination: "Nyika national park",
    discount: "15",
    desc: "5 Days Exploration",
    img: "park.jpg",
    id: "03",
    fee: "20",
  },
  {
    destination: "All stuning sites in Malawi",
    discount: "25",
    desc: "14 Days Comprehensive Tour",
    img: "general.jpg",
    id: "04",
    fee: "20",
  },
];

// appending services to html elements---------------------------------------------------
const servicesElement = document.querySelector(".services"),
  offersElement = document.querySelector(".offers-grid");
let servicesHtml = `<div class="header">Our Services</div>`,
  offersHtml = ``;
services.forEach((service) => {
  const serviceHtml = `<div class="service">
        <img src="../images/${service.img}" alt="">
        <div class="details">
          <div class="header">${service.title}</div>
          <p>${service.desc}</p>
        </div>
      </div>`;
  servicesHtml += serviceHtml;
});
servicesHtml += `<div class="img"><img src="../images/bg8.jpg"></div>`;
servicesElement.innerHTML = servicesHtml;

// appending offers to html elements---------------------------------------------------
offers.forEach((offer) => {
  const offerHtml = `<div class="offer" data-id="${offer.id}">
          <div class="thumbnail">
            <img src="../images/offer-${offer.img}" alt="" />
          </div>
          <div class="view">Get offer</div>
          <div class="discount">
            <p>${offer.discount}%</p>
            <p>off</p>
          </div>
          <div class="offer-details">
            <p>${offer.desc}</p>
            <p>${offer.destination}</p>
          </div>
        </div>`;
  offersHtml += offerHtml;
});
offersElement.innerHTML = offersHtml;

// triggering the offer card on click of the offer image---------------------------------------------------------
const overlay = document.querySelector(".overlay"),
  card = document.querySelector(".card"),
  offer = document.querySelectorAll(".offer"),
  head = document.querySelector("head style");
// listening to each offer for a click event and appending dynamic offer data ----------------------------------
offer.forEach((offer) => {
  offer.onclick = () => {
    const id = offer.dataset.id;
    let siteHtml = ``,
      keyframes;
    offers.forEach((site) => {
      if (site.id === id) {
        // Generating the html for the sites------------------------------------------------------------------------
        siteHtml = `<p class="close"><i class="fas fa-times"></i></p>
      <div class="title">${site.destination}</div>
      <div class="image-grid">
      </div>
      <form class="book-form">
        <div class="detail-grid">
          <p>Trip Duration</p>
          <div class="fee">
            <p>Daily Fee</p>
            <input name="fee" type="text" disabled value="$${site.fee}/person" required>
            <input name="fee" type="text" hidden value="${site.fee}" required>
            <input name="dest" type="text" hidden value="${site.destination}" required>
          </div>
          <div class="date from">
            <label>From</label>
            <input type="date" name="from" id="" required>
          </div>
          <div class="ppl">
            <label>No. of people</label><input type="number" name="number_of_ppl" id="" required>
          </div>
          <div class="date to">
            <label>To</label>
            <input type="date" name="to" id="">
          </div>
          <input type="text" name="additional_info" placeholder="Enter additional information">
        </div>
        <input type="submit" value="Reserve Trip">
      </form>`;
        //generating the styles that will make the slide show of the destinations---------------------------------------------------------
        keyframes = `
              @keyframes slide {
                20% {
                  background: url(../images/sites/${site.destination}/2.jpg);
                  background-size: cover;
                }
                40% {
                  background: url("../images/sites/${site.destination}/3.jpg");
                  background-size: cover;
                }
                60% {
                  background: url("../images/sites/${site.destination}/4.jpg");
                  background-size: cover;
                }
                80% {
                  background: url("../images/sites/${site.destination}/5.jpg");
                  background-size: cover;
                }
                100% {
                  background: url("../images/sites/${site.destination}/1.jpg");
                  background-size: cover;
                }
              }
              .image-grid {
                height: 250px;
                background: url("../images/sites/${site.destination}/1.jpg");
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
                background-size: cover;animation: slide 30s infinite;
              }
              `;
      }
    });
    // appending the dynamic offer card and the slideshow css to the document -------------------------------------------
    card.innerHTML = siteHtml;
    head.innerHTML = keyframes;
    remHidden();
    const closeBtn = document.querySelector(".close");
    closeBtn.onclick = () => {
      overlay.classList.add("hidden");
      card.classList.add("hidden");
    };
    const rForm = document.querySelector(".card form"),
      reserveBtn = rForm.querySelector("input[type='submit']");
    reFormSubmit(rForm, reserveBtn);
  };
});

// showing the offer card and the overlay
function remHidden() {
  card.classList.remove("hidden");
  overlay.classList.remove("hidden");
}

// Reserving a trip--------------------------------------------------------------------------------------------
const xhr = new XMLHttpRequest();
function reFormSubmit(form, btn) {
  form.onsubmit = (e) => e.preventDefault();
  btn.onclick = () => {
    const formData = new FormData(form);
    xhr.open("POST", "../scripts/backend/book.php", true);
    xhr.send(formData);
    xhr.onload = () => {
      const data = xhr.response;
      if (data === "success") {
        alert("Trip Reserved");
        remHidden();
      } else {
        alert(data);
      }
    };
  };
}
