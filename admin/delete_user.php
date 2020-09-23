<?php
include 'permission.php';
require_once("../lib/connection.php");

if (isset($_GET["username"])) {
	$username = $_GET["username"];
	$sql = "delete from user where username = '$username'";
	$query = mysqli_query($conn, $sql);
	header('Location: users_management.php');
}


?>