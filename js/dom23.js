"use strict";

var visibleImage = true;

function printContent() {
    var dictionary = {
        "wegetarianizm": "Dieta wegetariańska",
        "weganizm": "Dieta wegańska",
        "srodziemnomorska": "Dieta śródziemnomorska",
        "protein": "Dieta proteinowa"

    };
    var anchors = document.anchors;
    var content = "Rodzaje diet: <br>";
    var current, i;
    for (i = 0; i < anchors.length; i += 1){
        current = anchors.item(i);
        if (!!dictionary[current.name]) {
            content += "→ <a href=\"#";
            content += current.id;
            content += "\">";
            content += dictionary[current.name];
            content += "</a> <br>";
        }
    }
    document.getElementById("spis").innerHTML = content;
}

function printSource() {
    var links = document.links;
    var content = "";
    content += "<a href='" + links.namedItem("wegeta").href + "'>" + "źródło " + 1 + "</a> | ";
    content += "<a href='" + links.namedItem("wege").href + "'>" + "źródło " + 2 + "</a> | ";
    content += "<a href='" + links.namedItem("srod").href + "'>" + "źródło " + 3 + "</a> | ";
    content += "<a href='" + links.namedItem("prot").href + "'>" + "źródło " + 4 + "</a>";

    document.getElementById("source").innerHTML = content;
}

function switchImages(event) {
    event.preventDefault();
    var images = document.images;
    var i;
    if (visibleImage) {
        for (i = 0; i < images.length; i += 1){
            images.item(i).style.visibility = "hidden";
        }
        visibleImage = false;
        document.getElementById("switchImageButton").value = "Pokaż obrazki";
    }
    else {
        for (i = 0; i < images.length; i += 1){
            images.item(i).style.visibility = "visible";
        }
        visibleImage = true;
        document.getElementById("switchImageButton").value = "Ukryj obrazki";
    }
}

function changeView(event) {
    event.preventDefault();
    var colorForm = document.forms.namedItem("colors");
    var fontForm = document.forms.namedItem("fonts");

    document.body.style.backgroundColor = colorForm[0].value;

    var fontColor;
    switch (colorForm[1].value){
        case 'czarny':
            fontColor = 'black';
            break;
        case 'biały':
            fontColor = 'white';
            break;
        case 'czerwony':
            fontColor = 'red';
            break;
        case 'zielony':
            fontColor = 'green';
            break;
        case 'niebieski':
            fontColor = 'blue';
            break;
    }
    document.body.style.color = fontColor;

    document.body.style.fontFamily = fontForm[0].value;

}

function init() {
    printContent();
    printSource();
    document.getElementById("switchImageButton").addEventListener("click", switchImages);
    document.getElementById("changeViewButton").addEventListener("click", changeView);
}
window.addEventListener("load", init);
