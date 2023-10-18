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
   
        //Call the delete function
        deleteUser(userId);
    }
});

// Eventlistener Cancel-button in modal
document.getElementById("cancelDeleteButton").addEventListener("click", function() {
    //Hide modal
    $('#deleteConfirmationModal').modal('hide');
});

//Function to delete a user by id
function deleteUser(userId) {

    //Show confirmation modal
    $('#deleteConfirmationModal').modal('show');

    //Handle click in modal
    $('#confirmDeleteButton').off("click").on("click", function() {

    //Hide modal
    $('#deleteConfirmationModal').modal('hide');

        //DELETE-request to the server
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "includes/delete-endpoint.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        //String - users id
        const data = "id=" + userId;

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                // Snygga till detta - enbart basic test nu!!!!
                alert(xhr.responseText);

                //Reload page after delete
                refreshPage();
            }
        };

        //Send POST-request
        xhr.send(data);
    });
}

//Function to reload the page
function refreshPage() {
    location.reload();
}