<?php
    $server_username = 'dangzed';
    $server_password = 'masterofshadow';
    $server_host = "localhost";
    $database = 'example_database';

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("cant connect to database");
    // mysqli_query($conn,"SET NAMES 'UTF8'");
?>