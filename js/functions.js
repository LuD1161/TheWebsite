function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("nav").style.marginLeft = "250px";
    document.getElementById("mainBody").style.marginLeft = "250px";
    //document.getElementById("foot").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("nav").style.marginLeft = "0";
    document.getElementById("mainBody").style.marginLeft = "0";
    //document.getElementById("foot").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}
