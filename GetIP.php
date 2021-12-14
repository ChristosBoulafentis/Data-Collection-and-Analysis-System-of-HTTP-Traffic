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


    $result1=mysqli_query($conn,"SELECT `serverIPAddress` FROM `table` WHERE `User`='$Fir'");
    

    $data = array();

    while ($row = mysqli_fetch_array($result1)) {
        array_push($data, $row["serverIPAddress"]);
    }

    echo json_encode($data);
	
    mysqli_close($conn);
?>