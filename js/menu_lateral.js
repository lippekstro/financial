function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    if (window.innerWidth >= 600) {
        document.getElementById("main").style.marginLeft = "250px";
    } else {
        document.getElementById("main").style.marginLeft = "0";
    }
    document.getElementById("hamburger").style.visibility = 'hidden';
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("hamburger").style.visibility = 'visible';
}