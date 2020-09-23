<?php
include 'permission.php';
require_once("../lib/connection.php");

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$sql = "delete from product where id = '$id'";
	$query = mysqli_query($conn, $sql);
	header('Location: products_management.php');
}


?>