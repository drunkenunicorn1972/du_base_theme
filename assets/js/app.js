const openMenuButton = document.getElementById('rvr-mainnav-button-mb');
const closeMenuButton = document.getElementById('rvr-mainnav-button-close-mb');
const elWithSubmenu = document.getElementsByClassName('rvr_mmsubmenu_open_icon');
let elState = ''; let elID;


for (let i = 0; i < elWithSubmenu.length; i++) {

    elWithSubmenu[i].addEventListener("click", function(e) {
        elState = elWithSubmenu[i].getAttribute("data-state");
        elWithSubmenu[i].parentElement.classList.toggle('submenu-is-visible');
        if(elState === 'closed') {
            elWithSubmenu[i].innerHTML = '<wvicon class="icon-minus-square"></wvicon>';
            elWithSubmenu[i].setAttribute("data-state", "open");
        } else {
            elWithSubmenu[i].innerHTML = '<wvicon class="icon-plus-square"></wvicon>';
            elWithSubmenu[i].setAttribute("data-state", "closed");
        }
        e.preventDefault();
    })

}

openMenuButton.addEventListener('click', function() {
    document.body.classList.toggle('nav-is-toggled')
})

closeMenuButton.addEventListener('click', function() {
    document.body.classList.toggle('nav-is-toggled')
})
