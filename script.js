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
    
        //Call the delete function
        deleteUser(userId);
    }
});

//Function to delete a user by id
function deleteUser(userId) {
    // Visa raderingsbekräftelse-modal
    $('#deleteConfirmationModal').modal('show');

    // Hantera klick på "Radera" i modalen
    $('#confirmDeleteButton').click(function() {
        // Dölj modalen
        $('#deleteConfirmationModal').modal('hide');

        // Här kan du göra DELETE-förfrågan till servern
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "includes/delete-endpoint.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Gör en sträng av användarens id
        const data = "id=" + userId;

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Snygga till detta - enbart basic test nu!!!!
                alert(xhr.responseText);

                // Ladda om sidan för att få den uppdaterade användarlistan
                refreshPage();
            }
        };

        // Skicka POST-förfrågan
        xhr.send(data);
    });
}

//Function to reload the page
function refreshPage() {
    location.reload();
}