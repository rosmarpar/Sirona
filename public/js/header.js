//Execute function on click event
document.getElementById("btn_open").addEventListener("click", open_close_menu);

//Declare variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

//Event to show and hide menu
function open_close_menu() {
    body.classList.toggle("body_move");
    side_menu.classList.toggle("menu__side_move");
}

//If the page width is less than 760px, it will hide the menu on page reload

if (window.innerWidth < 760) {

    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
}

//Making the menu responsive

window.addEventListener("resize", function() {

    if (window.innerWidth > 760) {

        body.classList.remove("body_move");
        side_menu.classList.remove("menu__side_move");
    }

    if (window.innerWidth < 760) {

        body.classList.add("body_move");
        side_menu.classList.add("menu__side_move");
    }

});