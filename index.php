<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Link to my CSS-file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>My test assignment</title>
</head>
<body>

    <?php include('header.php'); ?>
  
    <main class='wrapper-frontpage container-fluid'>

        <div class="container">

            <div class="text-container">
                <h1>Welcome to my <span class="uppercase">Test Assignment</span> project</h1>
                <h5>New user? Please add your name and country below</h5>
            </div>
        
            <form class='add-new-user-form' method='post' action='includes/post-endpoint.php'>
                <label for='name'>Name?</label>
                <input type='text' id='name' name='name' placeholder='Enter your name...' <?php if (isset($_SESSION['error_message'])) echo 'class="error-input"'; ?>>
                <br>
    
                <label for='country'>Country?</label>
                <input type='text' id='country' name='country' placeholder='Enter your country...' <?php if (isset($_SESSION['error_message'])) echo 'class="error-input"'; ?>>
                <br>

                <button type='submit' class='submit-btn'>Submit</button>
            </form>

            <?php
                session_start();

                if (isset($_SESSION['success_message'])) {
                    echo '<br>';
                    echo '<div class="success">' . $_SESSION['success_message'] . '</div>';
                    unset($_SESSION['success_message']);
                }

                if (isset($_SESSION['error_message'])) {
                    echo '<br>';
                    echo '<div class="error">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']);
                    }
                ?>

        </div>

    </main>

    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>