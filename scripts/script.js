function setMenuSelected()
{
    const menu = document.querySelectorAll("#menu a");
    for (let opt of menu) {
        if (document.location.href.includes(opt.href)) {
            opt.classList.add("selected");
            break;
        }
    }
}

setMenuSelected();
