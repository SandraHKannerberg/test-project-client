<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Link to my CSS-file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Icons Font Awesome -->
    <script src="https://kit.fontawesome.com/bce314e193.js" crossorigin="anonymous"></script>
    <!-- My JS script -->
    <script src="script/script.js" defer></script>
    <title>My test assignment</title>
</head>
<body>
    <?php 
    //session_start();
    $page = 'home';
    include("includes/content/header.php"); 
    ?>
  
    <main class="frontpage-wrapper container-fluid">
        <div class="my-form-wrapper container">
            <div class="row text-center">
                <div class="my-text-wrapper col">
                    <h1>Welcome to my</h1>
                    <span class="my-texttransform">Test Assignment</span>
                </div>
            </div>

            <div class="text-center col-12">
                <h6>New user? Please add your name and country below</h6>
            </div>
              
            <div class="my-form col-12 col-sm-8 col-md-6 col-lg-4">
                <form method="post" action="includes/endpoints/post.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="my-input form-control shadow-sm" <?php if (isset($_SESSION['error_message'])) echo 'class="error-input"'; ?>>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" id="country" name="country" class="my-input form-control shadow-sm"  <?php if (isset($_SESSION['error_message'])) echo 'class="error-input"'; ?>>
                    </div>

                    <button type="submit" class="my-submit-btn btn shadow">Submit</button>
                </form>
                <?php
                //Div for error or success messages
                if (isset($_SESSION["success_message"])) {
                    echo "<br>";
                    echo "<div class='my-success-alert alert alert-success text-center' role='alert' id='success_message'>" . $_SESSION["success_message"] . "</div>";
                    unset($_SESSION['success_message']);
                }

                if (isset($_SESSION["error_message"])) {
                    echo "<br>";
                    echo "<div class='my-error-alert alert alert-danger text-center' role='alert' id='error_message'>" . $_SESSION["error_message"] . "</div>";
                    unset($_SESSION["error_message"]);
                }

                if (isset($_SESSION["error_name"])) {
                    echo "<br>";
                    echo "<div class='my-error-alert alert alert-danger text-center' role='alert' id='error_name'>" . $_SESSION["error_name"] . "</div>";
                    unset($_SESSION["error_name"]);
                }
                ?>
            </div>
        </div>
    </main>

    <?php include("includes/content/footer.php"); ?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JavaScript Bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>