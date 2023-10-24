//SET TIMER AFTER 8 SECONDS
//Error input
setTimeout(function() {
    const errorMessage = document.getElementById("error_message");
    if (errorMessage) {
      errorMessage.style.display = "none";
}}, 8000);

//Success new user
setTimeout(function() {
    const successMessage = document.getElementById("success_message");
    if (successMessage) {
      successMessage.style.display = "none";
}}, 8000);

//Error name already exists
setTimeout(function() {
  const errorName = document.getElementById("error_name");
  if (errorName) {
    errorName.style.display = "none";
}}, 8000);