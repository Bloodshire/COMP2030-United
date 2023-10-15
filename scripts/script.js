// Create a new link element
var faviconLink = document.createElement("link");

// Set the attributes for the link element
faviconLink.rel = "icon";
faviconLink.href =
  "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'%3E%3Cstyle%3Esvg{fill:%23ffcb08}%3C/style%3E%3Cpath d='M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z'%3E%3C/path%3E%3C/svg%3E";
faviconLink.type = "image/svg+xml";

// Insert the link element into the head of the document
document.head.appendChild(faviconLink);

function setMenuSelected() {
  const menu = document.querySelectorAll("#menu a");
  const menuSelected = document.querySelector("#menu-selected");
  const pageHeading = document.querySelector("#page-heading");

  if (document.querySelector("#heading-back-btn")) {
    pageHeading.remove();
    const newHeading = document.querySelector("#heading-back-btn");
    newHeading.innerHTML += " " + document.title.toString();
  } else {
    pageHeading.innerHTML = document.title.toString();
  }

  for (let opt of menu) {
    if (menuSelected.href.includes(opt.href)) {
      opt.classList.add("selected");
      break;
    }
  }
}

setMenuSelected();

const time1Input = document.getElementById("time1");
const time2Input = document.getElementById("time2");
const resultBox = document.getElementById("resultBox");

time1Input.addEventListener("input", calculateTimeDifference);
time2Input.addEventListener("input", calculateTimeDifference);

function calculateTimeDifference() {
  const time1 = new Date(`2023-09-05T${time1Input.value}`);
  const time2 = new Date(`2023-09-05T${time2Input.value}`);

  if (isNaN(time1.getTime()) || isNaN(time2.getTime())) {
    resultBox.value = "Invalid input";
  } else {
    const timeDifference = Math.abs(time2 - time1);
    const hours = Math.floor(timeDifference / 3600000);
    const minutes = Math.floor((timeDifference % 3600000) / 60000);
    resultBox.value = `${hours.toString().padStart(2, "0")}:${minutes
      .toString()
      .padStart(2, "0")}`;
  }
}


var notification = document.getElementById("notification");
if (notification) {
  // Remove the element after the animation ends
  notification.addEventListener("animationend", function () {
    notification.remove();
  });
}

const canvas = document.querySelector("canvas");
const form = document.querySelector(".signature-pad-form");
const clearButton = document.querySelector(".clear-button");

