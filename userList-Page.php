<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Link to my CSS-files -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <!-- Icons Font Awesome -->
    <script src="https://kit.fontawesome.com/bce314e193.js" crossorigin="anonymous"></script>
    <!-- My JS script -->
    <script src="script.js" defer></script>
    <title>Users</title>
</head>
<body>

    <!-- Header -->
    <?php include("includes/header.php"); ?>

    <!-- Modal - Confirmation before delete -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel"><i class="fa-solid fa-triangle-exclamation"></i> Confirm before delete</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?</br>
                    This action is permanent
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelDeleteButton">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal - Confirmation after deletion -->
<!-- <div class="modal fade" id="deleteAfterConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteAfterConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAfterConfirmationModalLabel">User Deleted</h5>
            </div>
            <div class="modal-body">
                The user has been successfully deleted.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div> -->

    <main class="my-userlist-wrapper container-fluid" id="my-userlist">

        <!-- Alert after delete -->
        <div class="my-success-alert alert alert-success text-center shadow-sm col-sm-10 col-md-8 col-lg-6" id="successAlert" role="alert">
            <i class="fa-solid fa-check"></i> The user is deleted
        </div>

        <!-- Table - Render list of users -->
        <div class="my-table-wrapper col-sm-10 col-md-8 col-lg-6">
            <h2 class="text-center">List of users</h2>
            <?php include("includes/get-userlist.php"); ?>
        </div>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

    <!-- JavaScript files connected to Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</body>
</html>