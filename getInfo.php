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

    
    if (isset($_POST['USER'])){
        $Fir=$_POST['USER'];
    }

    $data = array();

    $result1=mysqli_query($conn,"SELECT `usermail` FROM `user` WHERE `username`='$Fir'");
    $row = mysqli_fetch_array($result1);
    array_push($data, $row["usermail"]);

    $result2=mysqli_query($conn,"SELECT `userpass` FROM `user` WHERE `username`='$Fir'");
    $row = mysqli_fetch_array($result2);
    array_push($data, $row["userpass"]);

    echo json_encode($data);
	
    mysqli_close($conn);
?>