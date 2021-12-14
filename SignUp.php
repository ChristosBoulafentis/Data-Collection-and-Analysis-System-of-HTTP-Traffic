<?php
    header("Access-Control-Allow-Origin: *");
    $servername = "localhost";
    $database = "database";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
  
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
     
    echo "Connected successfully";
     	 
	 if (isset($_POST['SDT'])){
		 $Fir=$_POST['SDT'];
		 $Sec=$_POST['SIPA'];
		 $Thi=$_POST['WAIT'];
	 }
	 
	$sql = "INSERT INTO `user`
	(`usermail`,`username`,`userpass`) 
	VALUES ('$Fir','$Sec','$Thi')";

    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>