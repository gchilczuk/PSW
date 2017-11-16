window.addEventListener("load", init);

function init(){
    document.getElementById("submitButton").addEventListener("click", captcha);
}

function captcha(event) {
    var isCorrect = false;
    var counter = 0;

    do {
        counter++;
        isCorrect = captchaCore();
    } while (!isCorrect && counter < 3)

    if (isCorrect) {
        window.alert("Dziękujemy za rejestrację.");
    } else {
        event.preventDefault();
        window.alert("Przykro nam, nie możemy Cię zarejestrować.")
    }
    return isCorrect;
}

function captchaCore(){
    var a = Math.floor(1 + Math.random()*10);
    var b = Math.floor(1 + Math.random()*10);

    var answer = window.prompt("Podaj wynik: " + a + " + " + b + " = ");
    var result = parseInt(answer) === a + b;

    return result;
}
