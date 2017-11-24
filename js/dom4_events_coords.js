"use strict";

function createCoordsDiv(msg) {
	var newNode = document.createElement("div");
	newNode.setAttribute("id", "coords");	
	newNode.appendChild(document.createTextNode(msg));
	return newNode;
}

function showCoords(e) {
    var client_x = e.clientX;
    var client_y = e.clientY;
    var screen_x = e.screenX;
    var screen_y = e.screenY;

    var client_coords = "Klient - X: " + client_x + ", Y : " + client_y;
    var screen_coords = "Ekran - X: " + screen_x + ", Y : " + screen_y;
    var coords = "Twoja pozycja:" + "<br>" + client_coords + "<br>" + screen_coords;
    
    var currentNode = document.getElementById("coords");
    currentNode.innerHTML = coords;
}    

function out() {	
 	var newNode = createCoordsDiv("Najedź między nagłówek a stopkę aby zobaczyć swoje współrzędne");
 	var currentNode = document.getElementById("coords");
 	currentNode.parentNode.replaceChild(newNode, currentNode);  

 	document.getElementById("1").style.backgroundColor = "#FFFFFF";
}

function over() {
	document.getElementById("1").style.backgroundColor = "#e5dedc";
}

function init() {
	document.getElementById("1").addEventListener("mousemove", showCoords, false);
	document.getElementById("1").addEventListener("mouseover", over, false);
	document.getElementById("1").addEventListener("mouseout", out, false);
}

window.addEventListener("load", init, false);