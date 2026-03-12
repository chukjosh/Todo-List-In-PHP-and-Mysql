<?php
    // configuration to connect to the database
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "todo";

    // Check the connection, if it's sucessful or not
    $conn = mysqli_connect($hostname, $username, $password, $database) or die("Connection failed: " . mysqli_connect_error());
?>