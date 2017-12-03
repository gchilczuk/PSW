"use strict";

var helpMessages = ["Wprowadź nazwę użytkownika",
					"Wprowadź email w formacie: nazwa@domena, np. moj_email1@op.pl",					
					"Oceń przepis w skali 1-10",
					"Napisz nam co myślisz. Tylko kulturalnie :)",
					"Po zaznaczeniu tej opcji, będziesz otrzymywał na podany adres email powiadomienia o nowych przepisach",
					"Zaznacz tę opcję abyśmy mogli lepiej poznać Twoją opinię"];

const defaultMessage = "";

var inputIds = ["username", "email", "rating", "content", "sub", "question"];

function createHelpDiv(msg) {
	var newNode = document.createElement("div");
	newNode.setAttribute("id", "helpText");	
	newNode.appendChild(document.createTextNode(msg));
	return newNode;
}

function registerListeners(obj, msgNumber) {
   obj.addEventListener("focus", 
      function() { 
      	var newNode = createHelpDiv(helpMessages[msgNumber]); 
      	var current = document.getElementById(inputIds[msgNumber]).parentNode; 
      	current.parentNode.insertBefore(newNode, current.nextSibling);},
      false );
   obj.addEventListener("blur", 
      function() { 
      	var current = document.getElementById(inputIds[msgNumber]).parentNode; 
      	current.parentNode.removeChild(current.nextSibling);
      }, 
      false );
}

function registerButtons() {
   var form = document.getElementById("commentsForm");
   form.addEventListener("submit", 
      function(event) { event.preventDefault(); return confirm( "Czy na pewno chcesz przesłać ten komentarz?"); },
      false );
   form.addEventListener("reset", 
      function(event) {  return confirm( "Czy na pewno chcesz zresetować formularz?"); },
      false );
}

function init() {	
	var i;
	for (i = 0; i < helpMessages.length; i += 1) {
		registerListeners(document.getElementById(inputIds[i]), i);
	}
	registerButtons();
}

window.addEventListener("load", init, false);
