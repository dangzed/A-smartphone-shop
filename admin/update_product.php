<?php
    include 'permission.php';
 ?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Product update </title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <div class="container">
      <div class="row">
          <?php
            require_once("../lib/connection.php");

            if (isset($_POST["save"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $price = $_POST["price"];
                
                if($_FILES['image']['size'] != 0){
                  $image = $_FILES['image']['name'];
                  $target = "../images/".basename($image);
                  $sql = "update product set name = '$name', price =$price, image='$image' where id = '$id'";
                  mysqli_query($conn, $sql);
                  move_uploaded_file($_FILES['image']['tmp_name'], $target);
                }else{
                  $sql = "update product set name = '$name', price =$price where id = '$id'";
                  mysqli_query($conn, $sql);
                }
                
                header('Location:products_management.php');
		    }

            $id = "";
		        $name = "";
            $price = "";
		    if (isset($_GET["id"])) {
		    	$id = $_GET["id"];
		    	$sql = "select * from product where id = '$id'";
		    	$query = mysqli_query($conn, $sql);
		    	while ( $data = mysqli_fetch_array($query) ) {
                    $name = $data["name"];
                    $price = $data["price"];
                    $image = $data["image"];
		    	}
		    }
          ?>
        <h3> Product info</h3>
        <form method="POST" action="update_product.php" enctype="multipart/form-data">
        <table class="table">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php echo "<img width='80px' height='80px' src='../images/".$image."' >"; ?>
            <tr><td>Image : </td><td><input type="file" name="image" /></td></tr>
          	<tr><td>Name : </td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td></tr>
          	<tr><td>Price : </td><td><input type="text" name="price" value="<?php echo $price; ?>" /></td></tr>
          	<tr><td colspan="2"><input type="submit" name="save" value="Save changes"></td></tr>
        </table>
        </form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  

</body></html>