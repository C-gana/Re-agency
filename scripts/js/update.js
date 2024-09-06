const closeBtn = document.querySelector(".close"),
  cards = document.querySelectorAll(".card"),
  updForm = document.querySelector(".update-form"),
  delForm = document.querySelector(".del-form"),
  updBtn = updForm.querySelector("input[type='submit']"),
  btns = document.querySelectorAll(".reservations button"),
  overlay = document.querySelector(".overlay"),
  xhr = new XMLHttpRequest();

updForm.onsubmit = (e) => {
  e.preventDefault();
};
delForm.onsubmit = (e) => {
  e.preventDefault();
};

const handleEdit = (btn) => {
  remHidden("edit"); //activating the card to show the info to be edited
  const row = btn.parentNode.parentNode, //selecting the active row
    td = row.querySelectorAll("td"), //selecting all table data on the current row
    tdInfo = {
      //storing the table data in an object for easy access
      ref: td[1].innerText,
      dest: td[2].innerText,
      from: td[3].innerText,
      to: td[4].innerText,
      nop: td[5].innerText,
      fee: td[6].innerText,
      add_info: td[8].innerText,
    };

  // Selecting all fields on the Update card to fill them with dynamic values------------------------------------------------
  let ref = updForm.querySelector("input[name='ref']"),
    dest = updForm.querySelector("input[name='dest']"),
    destTitle = updForm.parentElement.querySelector(".title span"),
    from = updForm.querySelector("input[name='from']"),
    to = updForm.querySelector("input[name='to']"),
    nop = updForm.querySelector("input[name='number_of_ppl']"),
    fee = updForm.querySelector("input[name='fee']"),
    addInfo = updForm.querySelector("input[name='additional_info']");
  // Initializing the update card with dynamic values from the clicked button----------------------------------------------
  ref.value = tdInfo.ref;
  destTitle.innerText = tdInfo.dest;
  dest.value = tdInfo.dest;
  from.value = tdInfo.from;
  to.value = tdInfo.to;
  nop.value = tdInfo.nop;
  fee.value = tdInfo.fee + "/person";
  addInfo.value = tdInfo.add_info;
  // handling the actual update------------------------------------------------------------------------------------------
  updBtn.onclick = () => {
    const formData = new FormData(updForm),
      msg = updForm.parentNode.querySelector(".msg");
    error = updForm.parentNode.querySelector(".error");
    xhr.open("POST", "../scripts/backend/updTrip.php", true);
    xhr.send(formData);
    xhr.onload = () => {
      console.log(ref.value);
      const data = xhr.response;
      if (data === "success") {
        msg.classList.add("active");
        error.classList.remove("active");
        msg.textContent = "Trip Updated Successfully";
        setTimeout(() => {
          location.href = "reservations.php";
        }, 1000);
      } else {
        error.classList.add("active");
        error.textContent = data;
      }
    };
  };
};

// handling the canel trip operation -----------------------------------------------------------
const handleCancel = (btn) => {
  remHidden("cancel");
  const row = btn.parentNode.parentNode, //selecting the active row
    td = row.querySelectorAll("td"), //selecting all table data on the current row
    yesBtn = document.querySelector(".yes"),
    noBtn = document.querySelector(".no"),
    tdInfo = {
      //storing the table data in an object for easy access
      ref: td[1].innerText,
      dest: td[2].innerText,
    };
  let title = delForm.parentElement.querySelector(".title span"),
    ref = delForm.querySelector("input[name='ref']");
  title.innerText = tdInfo.dest;
  ref.value = tdInfo.ref;
  yesBtn.onclick = () => {
    const formData = new FormData(delForm),
      msg = delForm.parentNode.querySelector(".msg");
    xhr.open("POST", "../scripts/backend/delete_trip.php", true);
    xhr.send(formData);
    xhr.onload = () => {
      const data = xhr.response;
      if (data === "success") {
        msg.classList.add("active");
        setTimeout(() => {
          location.href = "reservations.php";
        }, 1000);
      } else {
      }
    };
  };
};

// onclick event on edit and cancel buttons-----------------------------------------------------
btns.forEach(
  (btn) =>
    (btn.onclick = () =>
      btn.classList.contains("edit") ? handleEdit(btn) : handleCancel(btn))
);

// closing any open card---------------------------------------------------------------------
closeBtn.onclick = () => {
  overlay.classList.add("hidden");
  cards.forEach((card) => {
    if (!card.classList.contains("hidden")) {
      card.classList.add("hidden");
    }
  });
};
// showing the offer card and the overlay-----------------------------------------------------------
function remHidden(cardClass) {
  cards.forEach((card) => {
    if (card.classList.contains(`${cardClass}`)) {
      card.classList.remove("hidden");
    }
  });
  overlay.classList.remove("hidden");
}

function loadTbody() {
  const tbody = document.querySelector(".tbody");
}
