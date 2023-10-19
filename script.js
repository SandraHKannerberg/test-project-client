//Set a timer to hide the error message after 5 seconds
setTimeout(function() {
    const errorMessage = document.getElementById("error_message");
    if (errorMessage) {
        errorMessage.style.display = "none";
}}, 8000);

//Set a timer to hide the success message after 8 seconds
setTimeout(function() {
    const successMessage = document.getElementById("success_message");
    if (successMessage) {
        successMessage.style.display = "none";
}}, 8000);