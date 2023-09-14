function setMenuSelected()
{
    const menu = document.querySelectorAll("#menu a");
    const menuSelected = document.querySelector("#menu-selected");
    const pageHeading = document.querySelector("#page-heading");

    pageHeading.innerHTML = document.title.toString();

    for (let opt of menu) {
        if (menuSelected.href.includes(opt.href)) {
            opt.classList.add("selected");
            break;
        }
    }
}

setMenuSelected();

const time1Input = document.getElementById('time1');
const time2Input = document.getElementById('time2');
const resultBox = document.getElementById('resultBox');

time1Input.addEventListener('input', calculateTimeDifference);
time2Input.addEventListener('input', calculateTimeDifference);

function calculateTimeDifference() {
    const time1 = new Date(`2023-09-05T${time1Input.value}`);
    const time2 = new Date(`2023-09-05T${time2Input.value}`);

    if (isNaN(time1.getTime()) || isNaN(time2.getTime())) {
        resultBox.value = 'Invalid input';
    } else {
        const timeDifference = Math.abs(time2 - time1);
        const hours = Math.floor(timeDifference / 3600000); 
        const minutes = Math.floor((timeDifference % 3600000) / 60000);
        resultBox.value = `${hours} hours and ${minutes} minutes`;
    }
}