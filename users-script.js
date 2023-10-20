//Eventlistener delete-button
document.querySelector("tbody").addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-button")) {
        // Get the users id
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
        xhr.open("POST", "includes/endpoints/delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        //String - users id
        const data = "id=" + userId;

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

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

//Set a timer to hide confirmation message after 8 seconds
setTimeout(function() {
    const completedMessage = document.getElementById("completed_message");
    if (completedMessage) {
        completedMessage.style.display = "none";
}}, 8000);


//EDIT
document.addEventListener("DOMContentLoaded", function () {
    const editConfirmButtons = document.querySelectorAll(".editConfirm-button");
    
    editConfirmButtons.forEach(function (button) {
      button.addEventListener("click", function () {

        // Catch the user details when clicking the editConfirm-button
        const userId = button.closest(".collapse").getAttribute("id").replace("user-", "");
        const userNameInput = document.querySelector("#user-" + userId + " input[name='edit-name']");
        const userCountryInput = document.querySelector("#user-" + userId + " input[name='edit-country']");

        //Variable for error messages
        const errorMessage = document.querySelector("#error-update-" + userId);
  
        if (userNameInput && userCountryInput) {
          const userName = userNameInput.value;
          const userCountry = userCountryInput.value;
  
          //Name or Country input can't be empty
          if (userName.trim() !== "" && userCountry.trim() !== "") {
            
            // PUT-request to the server
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "includes/endpoints/update.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
            // String to Quarkus - user details
            const userData = "id=" + userId + "&edit-name=" + userName + "&edit-country=" + userCountry;

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                  if (xhr.status === 200) {

                    // Reload page after update
                    refreshPage();
                  } else {
                    // Display an error message
                    errorMessage.textContent = "An error occurred. Please try again.";
                    errorMessage.style.display = "block";
                  }
                }
              };
  
            // Send the request with the string of user details
            xhr.send(userData);
              
          } else {
            // Display an error message
            console.log("Name and Country fields can not be empty.");
            errorMessage.textContent = "An error occurred. Name and/or Country can't be empty.";
            errorMessage.style.display = "block";
          }

        } else {
        // Display an error message
          console.log("Input fields not found or null.");
          errorMessage.textContent = "Input fields not found or null.";
          errorMessage.style.display = "block";
        }
      });
    });
  });
  