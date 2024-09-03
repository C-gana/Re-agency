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
    discount: "30",
    desc: "3 Days Adventure",
    img: "likoma.jpg",
    id: "01",
    fee: "20",
  },
  {
    destination: "Mulanje Mountain",
    discount: "30",
    desc: "7 Days Hiking Expedition",
    img: "mulanje.jpg",
    id: "02",
    fee: "20",
  },
  {
    destination: "Nyika national park",
    discount: "30",
    desc: "5 Days Exploration",
    img: "park.jpg",
    id: "03",
    fee: "20",
  },
  {
    destination: "All stuning sites in Malawi",
    discount: "30",
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

const overlay = document.querySelector(".overlay"),
  card = document.querySelector(".card"),
  offer = document.querySelectorAll(".offer");
offer.forEach((offer) => {
  offer.onclick = () => {
    const id = offer.dataset.id;
    let siteHtml = ``;
    offers.forEach((site) => {
      if (site.id === id) {
        siteHtml = `<p class="close"><i class="fas fa-times"></i></p>
      <div class="title">${site.destination}</div>
      <div class="image-grid">
        <img src="../images/sites/${site.destination}/1.jpg" alt="">
        <img src="../images/sites/${site.destination}/2.jpg" alt="">
        <img src="../images/sites/${site.destination}/3.jpg" alt="">
        <img src="../images/sites/${site.destination}/4.jpg" alt="">
        <img src="../images/sites/${site.destination}/5.jpg" alt="">
        <img src="../images/sites/${site.destination}/6.jpg" alt="">
      </div>
      <form class="book-form">
        <div class="detail-grid">
          <p>Trip Duration</p>
          <div class="fee">
            <p>Daily Fee</p>
            <input name="fee" type="text" disabled value="$${site.fee}/person" required>
            <input name="fee" type="text" hidden value="$${site.fee}" required>
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
      }
    });
    card.innerHTML = siteHtml;
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

function remHidden() {
  card.classList.remove("hidden");
  overlay.classList.remove("hidden");
}

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
