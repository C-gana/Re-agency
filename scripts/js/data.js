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
  },
  {
    destination: "Mulanje Mountain",
    discount: "30",
    desc: "7 Days Hiking Expedition",
    img: "mulanje.jpg",
  },
  {
    destination: "Nyika & Liwonde national park",
    discount: "30",
    desc: "5 Days Exploration",
    img: "park.jpg",
  },
  {
    destination: "All stuning sites in Malawi",
    discount: "30",
    desc: "14 Days Comprehensive Tour",
    img: "general.jpg",
  },
];
// appending services to html elements
const servicesElement = document.querySelector(".services"),
  offersElement = document.querySelector(".offers-grid");
let servicesHtml = `<div id="services" class="header">Our Services</div>`,
  offersHtml = ``;

services.forEach((service) => {
  const serviceHtml = `<div class="service">
        <img src="images/${service.img}" alt="">
        <div class="details">
          <div class="header">${service.title}</div>
          <p>${service.desc}</p>
        </div>
      </div>`;
  servicesHtml += serviceHtml;
});
servicesHtml += `<div class="img"><img src="images/bg8.jpg"></div>`;
console.log(servicesHtml);
servicesElement.innerHTML = servicesHtml;

offers.forEach((offer) => {
  const offerHtml = `<div class="offer">
          <div class="thumbnail">
            <img src="images/offer-${offer.img}" alt="" />
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
