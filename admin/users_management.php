<?php include 'permission.php'; ?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Member management</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <?php
      require_once("../lib/connection.php");
    ?>
    <div class="container">
      <div class="row">
        <h3> Member management</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Level</th>
              <th>Action</td>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td><?php echo $data["username"]; ?></td>
              <td><?php echo $data["name"]; ?></td>
              <td><?php echo $data["email"]; ?></td>
              <td>
                <?php
                    if ($data["level"] == 1) {
                      echo "Administrator";
                    }else{
                      echo "Visitor";
                    }
                ?>
              </td>
              <td><a href="../update_user.php?username=<?php echo $data["username"]; ?>">Update</a> <a href="delete_user.php?username=<?php echo $data["username"]; ?>">Delete</a></td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>
      <div><a href="../logout.php">Log out</a></div>
      <div><a href="products_management.php">Product Management</a></div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  

</body></html>