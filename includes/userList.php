<h2>Existing users</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
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
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['country'] . '</td>';
            echo '<td>';
            echo '<button type="button" class="btn btn-dark">Edit</button>';
            echo '<button type="button" class="btn btn-danger">Delete</button>';
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