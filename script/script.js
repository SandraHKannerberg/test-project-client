  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })

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