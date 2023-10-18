<table class="table table-success table-striped table-hover align-middle">
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
    //Connect to database
    include("includes/config.php");

    //Get all users
    $sql = "SELECT * FROM user_table";

    $users = $conn->query($sql);

    //Loop all users and give each user one line
    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='my-table-content-center'>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td class='text-center'>";
            echo "<button type='button' class='btn btn-dark'><i class='fa-solid fa-pen-to-square'></i></button>";
            echo "</td>";
            echo "<td class='text-center'>";
            echo "<button type='button' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No users found in the database</td></tr>";
    }

    $conn->close();
    ?>
    </tbody>
</table>