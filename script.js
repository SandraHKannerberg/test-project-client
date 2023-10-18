// Set a timer to hide the error message after 5 seconds
setTimeout(function() {
    var errorMessage = document.getElementById("error_message");
    if (errorMessage) {
        errorMessage.style.display = "none";
}}, 5000);

// Set a timer to hide the success message after 8 seconds
setTimeout(function() {
    var successMessage = document.getElementById("success_message");
    if (successMessage) {
        successMessage.style.display = "none";
}}, 8000);


//Eventlistener delete-button
document.querySelector("tbody").addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-button")) {
        // Hämta användarens ID från data-id-attributet
        const userId = event.target.getAttribute("data-id");
        console.log("Radera användare med ID: " + userId);
    
        // Placera din raderingslogik här, t.ex. AJAX-anrop till en server
    }
});


