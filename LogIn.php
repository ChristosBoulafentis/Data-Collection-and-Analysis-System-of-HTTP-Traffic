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
	 
	 if (isset($_POST['SDT'],$_POST['SIPA'] )){
        
        $Fir=$_POST['SDT'];
        $Sec=$_POST['SIPA'];
        
        $result1=mysqli_query($conn,"SELECT `username`,`userpass` FROM `user` WHERE `username`='$Fir' AND `userpass`='$Sec'");
        if(mysqli_num_rows($result1) > 0 )
        {
            mysqli_query($conn,"UPDATE `user` SET '$Fir'='$Fir' ORDER BY '$Fir'");

            if($Fir=="ChrisBoul" || $Fir=="Panos" || $Fir=="Giwrgos"){
                $obj = (object) [
                    'admin' => 'http://localhost/save/adminpage.html'
                ];
                echo json_encode($obj);
            }
            else{
                $obj = (object) [
                    'admin' => 'http://localhost/save/userpage.html'
                ];
                echo json_encode($obj);
            }   
            
        }
        else
        {
            $obj = (object) [
                'admin' => 'http://localhost/save/error.html'
            ];
            echo json_encode($obj);
        }
     }
    mysqli_close($conn);
?>