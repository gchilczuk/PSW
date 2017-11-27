"use strict";

function changeImgSrc(e) {
	var image = document.getElementById("lasagne3_img");
	if(e.altKey) {
		image.src = "imgs/lasagne2.jpg";
	}		
}

function restoreDefaultSrc(e) {
	var image = document.getElementById("lasagne3_img");
	if(e.altKey) {
		image.src = "imgs/lasagne.jpg";
	}	
}

function zoomIn(e) {
	var image = document.getElementById("lasagne3_img");
	if(e.shiftKey) {
		image.style.height = '533px';
		image.style.width = '800px';
	}
}

function zoomOut(e) {
	var image = document.getElementById("lasagne3_img");
	if(e.ctrlKey) {
		image.style.height = '266px';
		image.style.width = '400px';
	}
}

function init() {
	document.getElementById("lasagne3_img").addEventListener("click", zoomOut, false);
	document.getElementById("lasagne3_img").addEventListener("dblclick", zoomIn, false);
	document.getElementById("lasagne3_img").addEventListener("mousedown", changeImgSrc, false);
	document.getElementById("lasagne3_img").addEventListener("mouseup", restoreDefaultSrc, false);
}

window.addEventListener("load", init, false);