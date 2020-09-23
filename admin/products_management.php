<?php include 'permission.php'; ?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product management</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <?php
      require_once("../lib/connection.php");
    ?>
    <div class="container">
      <div class="row">
        <h3> Product management</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Action</td>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td><?php echo $data["id"]; ?></td>
              <td><?php echo $data["name"]; ?></td>
              <td><?php echo "<img width='80px' height='80px' src='../images/".$data['image']."' >"; ?></td>
              <td><?php echo $data["price"]; ?></td>
              <td><a href="update_product.php?id=<?php echo $data["id"]; ?>">Update</a> <a href="delete_product.php?id=<?php echo $data["id"]; ?>">Delete</a></td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>
      <div><a href="../logout.php">Log out</a></div>
      <div><a href="add_product.php">Add product</a></div> 
      <div><a href="users_management.php">User Management</a></div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  

</body></html>