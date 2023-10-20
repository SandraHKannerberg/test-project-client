<table class="table table-success table-striped align-middle shadow-sm rounded">
  <thead class="table-dark">
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
    // Connect to the database
    include("includes/database/config.php");

    // Get all users
    $sql = "SELECT * FROM user_table";
    $users = $conn->query($sql);

    // Loop through all users
    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
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
            echo "</tr>";

            // User details accordion
            echo "<tr>";
            echo "<td colspan='5'>";
            echo "<div class='collapse' id='user-" . $row["id"] . "'>";
            echo "<div class='my-update-form card card-body'>";
            echo "Edit name? <input class='my-update-input' type='text' name='edit-name' value='" . $row["name"] . "'><br>";
            echo "Edit country? <input class='my-update-input' type='text' name='edit-country' value='" . $row["country"] . "'><br>";
            echo "<button class='btn btn-dark editConfirm-button'>Save</button>";
            echo "</br>";
            echo "<div id='error-update-" . $row["id"] . "' class='my-error-alert alert alert-danger' style='display: none;'></div>"; 
            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No users found in the database</td></tr>";
    }

    $conn->close();
    ?>
  </tbody>
</table>
