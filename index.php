<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Link to my CSS-file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>My test assignment</title>
</head>
<body>

    <?php include('header.php'); ?>
  
    <main class='container-fluid'>
        <div class="my-form-wrapper container">
            <div class="row text-center">
                <div class="my-text-wrapper col">
                    <h1>Welcome to my</h1>
                    <span class="my-texttransform">Test Assignment</span>
                </div>
            </div>
        
            <div class="my-form col-8">
                <div class="text-center col-8">
                    <h6>New user? Please add your name and country below</h6>
                </div>
                <br>
                <form method="post" action="includes/post-endpoint.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="my-input form-control" <?php if (isset($_SESSION['error_message'])) echo 'class="error-input"'; ?>>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" id="country" name="country" class="my-input form-control"  <?php if (isset($_SESSION['error_message'])) echo 'class="error-input"'; ?>>
                    </div>

                    <button type="submit" class="my-submit-btn btn">Submit</button>
                </form>
            </div>

            <?php
                //Div for error or success messages
                session_start();

                if (isset($_SESSION["success_message"])) {
                    echo "<br>";
                    echo "<div class='success'>" . $_SESSION["success_message"] . "</div>";
                    unset($_SESSION['success_message']);
                }

                if (isset($_SESSION["error_message"])) {
                    echo "<br>";
                    echo "<div class='error'>" . $_SESSION["error_message"] . "</div>";
                    unset($_SESSION["error_message"]);
                }
            ?>
        </div>
    </main>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>