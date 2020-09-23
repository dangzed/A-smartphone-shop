<?php
include 'permission.php';
?>
<html>
<head>
	<title>Admin Page</title>
	<meta charset="utf-8">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="jumbotron" >
		<h1 class="display-4">Hello, Admin!</h1>
		<hr class="my-4">
		<a href="users_management.php"><p>Go to users management</p></a>
		<a href="products_management.php"><p>Go to products management</p></a>
		<a class="btn btn-danger btn-lg" href="../logout.php" role="button">Log out</a>
	</div>
</div>
	
</body>
</html>
