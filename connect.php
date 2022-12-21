<?php 
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $databasename = "university";

    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if(!$conn){
        die("Could not connect to database");
    }

?>