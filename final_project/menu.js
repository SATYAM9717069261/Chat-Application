var a = 1;

function nav_click() {
    document.getElementById('menu').className = "clk_nav";
    document.getElementById("show_menu").style.display = "none";
}

function hide_menu() {
    document.getElementById('menu').className = "nav";
    document.getElementById("show_menu").style.display = "block";
}