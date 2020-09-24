<?php
    $server_username = 'b422b2ac9415c4';
    $server_password = '67f4374d';
    $server_host = "us-cdbr-east-02.cleardb.com";
    $database = 'heroku_0668a692c23638b';

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("cant connect to database");
    // mysqli_query($conn,"SET NAMES 'UTF8'");
?>