<!-- FILE TO GET ALL USERS IN DATABASE -->

 <!-- FUNCTION FOR PAGINATION -->
<?php
// Connect to the database
include("includes/database/connection.php");

//Users per page
$perPage = 10;

//Count all users
$totalUsersQuery = "SELECT COUNT(*) as total FROM user_table";
$totalUsersResult = $conn->query($totalUsersQuery);

if ($totalUsersResult->num_rows > 0) {
  $totalUsersRow = $totalUsersResult->fetch_assoc();
  $totalUsers = $totalUsersRow['total'];
}

//Count how many page
$totalPages = ceil($totalUsers / $perPage);

//Get the current page from URL
$currentPage = $_GET['page'] ?? 1;

if ($currentPage < 1) {
  $currentPage = 1;
} elseif ($currentPage > $totalPages) {
  $currentPage = $totalPages;
}

//Get the OFFSET-value for SQL-request
$offset = ($currentPage - 1) * $perPage;

// SQL-request to get users with pagination
$sql = "SELECT * FROM user_table Order By name LIMIT $perPage OFFSET $offset";
$users = $conn->query($sql);
?>

<!-- RENDER LIST OF USERS IN A TABLE -->
<table class="table table-success table-striped align-middle shadow-sm rounded">
  <thead class="my-table-header table-dark">
    <tr>
      <th scope="col" class="my-table-content-center">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
      <th scope="col" class="my-table-content-center">Edit</th>
      <th scope="col" class="my-table-content-center">Delete</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <?php
    // Loop through all users
    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            //Add a new tablerow for each user
            echo "<tr>";
            // User details
            echo "<td class='my-table-content-center'>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";

            // Edit button
            echo "<td class='text-center'>";
            echo "<button type='button' class='my-btn btn btn-dark edit-button' data-bs-toggle='collapse' data-bs-target='#user-" . $row["id"] . "'><i class='fa-solid fa-pen-to-square'></i></button>";
            echo "</td>";

            // Delete button
            echo "<td class='text-center'>";
            echo "<button type='button' class='my-btn btn btn-danger delete-button' data-id='" . $row["id"] . "'><i class='fa-solid fa-trash delete-button' data-id='" . $row["id"] . "'></i></button>";
            echo "</td>";

            //Close tablerow for each user
            echo "</tr>";

            // User details accordion. Section for edit user details
            echo "<tr>";
            echo "<td colspan='5'>";
            echo "<div class='collapse' id='user-" . $row["id"] . "'>";
            echo "<div class='my-update-form card card-body'>";
            echo "Edit name? <input class='my-update-input' type='text' name='edit-name' value='" . $row["name"] . "'><br>";
            echo "Edit country? <input class='my-update-input' type='text' name='edit-country' value='" . $row["country"] . "'><br>";
            echo "<button class='btn btn-dark editConfirm-button'>Save</button>";
            echo "</br>";

            //Errormessage
            echo "<div id='error-update-" . $row["id"] . "' class='my-error-alert alert alert-danger' style='display: none;'></div>"; 
            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No users found in the database</td></tr>";
    }

    //Close the connection
    $conn->close();

    ?>
  </tbody>
</table>


<!-- DIV TO SHOW THE PAGINATION UNDER THE USER TABLE -->
<div class="pagination-container">
  <?php 
    // Links in the pagination
    echo '<ul class="pagination">';
    if ($currentPage > 1) {
      echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
    }
    for ($page = 1; $page <= $totalPages; $page++) {
      echo '<li class="page-item' . ($page == $currentPage ? ' active' : '') . '"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
    }
    if ($currentPage < $totalPages) {
      echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
    }
    echo '</ul>';
  ?>
</div>