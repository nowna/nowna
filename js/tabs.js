window.onload=function() {
    // get tab container
    var container = document.getElementById("tabContainer");
    // set current tab
    var navitem = container.querySelector(".tabs button");
    //store which tab we are on
    var ident = navitem.id.split("_")[1];
    navitem.parentNode.setAttribute("data-current",ident);

    //hide two tab contents we don't need
    var pages = container.querySelectorAll(".tabpage");
    for (var i = 1; i < pages.length; i++) {
        pages[i].style.display="none";
    }

    //this adds click event to tabs
    var tabs = container.querySelectorAll(".tabs button");
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].onclick=displayPage;
    }
}

// on click of one of tabs
function displayPage() {
    var current = this.parentNode.getAttribute("data-current");
    document.getElementById("tabpage_" + current).style.display="none";

    var ident = this.id.split("_")[1];
    document.getElementById("tabpage_" + ident).style.display="block";
    this.parentNode.setAttribute("data-current",ident);
}
