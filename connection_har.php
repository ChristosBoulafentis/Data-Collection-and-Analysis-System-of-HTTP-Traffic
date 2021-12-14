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
          	 
	 if (isset($_POST['SDT'])){
        $Fir=$_POST['SDT'];
        $Sec=$_POST['SIPA'];
        $Thi=$_POST['WAIT'];
        $Fou=$_POST['METH'];
        $Fif=$_POST['URL'];
        $Six=$_POST['STATUS'];
        $Sev=$_POST['STATXT'];
        $Eig=$_POST['AGE'];
        $Nin=$_POST['CONTYPE'];
        $Ten=$_POST['PRAGMA'];
        $Ele=$_POST['EXP'];
        $Twe=$_POST['LAM'];
        $Theen=$_POST['HOST'];
        $Foureen=$_POST['CACHE'];
        $Fifeen=$_POST['DOMAIN'];
        $Sixeen=$_POST['USER'];
	 }
	 
	$sql = "INSERT INTO `table`
	(`startedDateTime`,`serverIPAddress`,`wait`,`method`,`url`,`status`,`statusText`,`age`,`content-type`,`pragma`,`expires`,`lastModified`,`host`,`cacheControl`,`domain`, `User`) 
	VALUES ('$Fir','$Sec','$Thi','$Fou','$Fif','$Six','$Sev','$Eig','$Nin','$Ten','$Ele','$Twe','$Theen','$Foureen','$Fifeen','$Sixeen')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>