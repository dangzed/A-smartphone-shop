<?php include 'permission.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Product Upload</title>

</head>
<body>

<?php
  // Create database connection
     include '../lib/connection.php'; 

  // If upload button is clicked ...
  if (isset($_POST['submit'])) {

	if($_FILES['image']['size'] > 500000){
		echo 'Your file is too big';
		die;
	}
  	// Get image name
	$image = $_FILES['image']['name'];
	$target = "../images/".basename($image);


	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];

	if($id == '' || $name == '' || $price == '' || $image == ''){
		echo 'Please fill in all blank!';
		die;
	}

	$sql = "select * from product where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$num_rows = mysqli_num_rows($result);

	if( $num_rows > 0){
		echo 'Already exist this item id';
		die;
	}

	$sql = "insert into product values ('$id','$name','$image',$price)";
	  mysqli_query($conn, $sql);
	  move_uploaded_file($_FILES['image']['tmp_name'], $target);

	header('Location:products_management.php');
  }
?>

	<div>
  <form action="add_product.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td colspan="2">Add product form</td>
			</tr>	
			<input type="hidden" name="size" value="10000000">
			<tr>
				<td>Image :</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td>Id :</td>
				<td><input type="text" id="id" name="id"></td>
			</tr>
            <tr>
				<td>Name :</td>
				<td><input type="text" id="name" name="name"></td>
			</tr>
            <tr>
				<td>Price :</td>
				<td><input type="text" id="price" name="price"></td>
			</tr>
            
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Add product"></td>
			</tr>

		</table>
		
	</form>
</div>
</body>
</html>