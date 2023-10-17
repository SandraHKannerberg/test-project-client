<h2 class="text-center">Existing users</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

    <?php
    //Connect to database
    include('includes/config.php');

    $conn = new mysqli($servername, $username, $password, $database, $port);

    //Check the connection
    if ($conn->connect_error) {
        die("Couldn't connect to database: " . $conn->connect_error);
    }

    //Get all users
    $sql = 'SELECT * FROM user_table';

    $users = $conn->query($sql);

    //Loop all users and give each user one line
    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            echo '<tbody class="my-tablebody">';
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['country'] . '</td>';
            echo '<td>';
            echo '<button type="button" class="my-edit-btn btn btn-dark"><i class="fa-solid fa-pen-to-square"></i></button>';
            echo '</td>';
            echo '<td>';
            echo '<button type="button" class="my-del-btn btn btn-danger"><i class="fa-solid fa-trash"></i></button>';
            echo '</td>';
            echo '</tr>';
            echo '</tbody>';
        }
    } else {
        echo '<tr><td colspan="3">No users found in the database</td></tr>';
    }

    $conn->close();
    ?>
</table>