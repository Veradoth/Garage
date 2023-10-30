 // Afficher le message pendant 10 secondes
 document.addEventListener("DOMContentLoaded", function() {
    var message = document.getElementById("temp-message");
    message.style.display = "block";
    setTimeout(function() {
        message.style.display = "none";
    }, 2000); // 10000 millisecondes = 10 secondes
});