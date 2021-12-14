<?php
    
    header('Access-Control-Allow-Origin: *');

    $servername = "localhost";
    $database = "database";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }

    
    if (isset($_POST['PASS'])){
        $Fir=$_POST['PASS'];
        $Sec=$_POST['USER'];
    }

    mysqli_query($conn,"UPDATE `user` SET `userpass` = '$Fir' WHERE `username` = '$Sec'");
	
    mysqli_close($conn);
?>