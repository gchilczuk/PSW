"use strict";


var rate;



function captchaCore(){
    var x;
    x = 1 + Math.random();
    var a = parseFloat(x.toFixed(1));
    x = 1 + Math.random();
    var b = parseFloat(x.toFixed(1));

    var answer = window.prompt("Podaj wynik: " + a + " + " + b + " = ");
    return parseFloat(answer) === a + b;
}

function captcha(event) {
    var isCorrect = false;
    var i;
    for (i = 0; i < 3 && !isCorrect; i+=1) {
        isCorrect = captchaCore();
    }

    if (isCorrect) {
        window.alert("Dziękujemy za Twoją opinię");
    } else {
        event.preventDefault();
        window.alert("Przykro nam, nie możemy przesłać Twojej opinii.");
    }
    return isCorrect;
}

function showResponse() {
	var response = document.getElementById("ratingText");	

	switch(rate) {
		case 1:
		case 2:
			response.innerHTML = "<p>Przykro nam to słyszeć. Co możemy zrobić aby strona podobała Ci się bardziej?</p>";
			response.innerHTML += '<textarea cols="50" rows="4"></textarea>';
			response.innerHTML += '<input id="responseBtn" type="submit" value="Prześlij odpowiedź">';
			break;
		case 3:			
		case 4:
			response.innerHTML = "<p>Dziękujemy za ocenę. Co możemy zrobić aby strona podobała Ci się jeszcze bardziej?\n</p>";
			response.innerHTML += '<textarea cols="50" rows="4"></textarea>';
			response.innerHTML += '<input id="responseBtn" type="submit" value="Prześlij odpowiedź">';
			break;
		case 5:
			response.innerHTML = "<p>Cieszymy się, że nasza strona tak Ci się podoba!</p>";
			break;
	}
}

function initSendResponseButton() {	
	document.getElementById("responseBtn").addEventListener("click", captcha);
}



function rateWebsite() {
    var answer = window.prompt("Oceń naszą stronę w skali 1-5");
    rate = parseInt(answer);
    showResponse();
    initSendResponseButton();
}

function init() {
    document.getElementById("ratingBtn").addEventListener("click", rateWebsite);
}
window.addEventListener("load", init);
