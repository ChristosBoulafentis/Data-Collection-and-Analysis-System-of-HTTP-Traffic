<?php
    
    header('Access-Control-Allow-Origin: *');

    $servername = "localhost";
    $database = "database";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }

    $data = array();

    /////////////////////  # of Users  ///////////////////////////////

    $result1=mysqli_query($conn,"SELECT * FROM `user`");
    $num_rows1 = mysqli_num_rows($result1);
    array_push($data, $num_rows1);


    $result2=mysqli_query($conn,"SELECT * FROM `table` WHERE method = 'POST'");
    $num_rows2 = mysqli_num_rows($result2);
    array_push($data, $num_rows2);

    //////////////////////////////  GET ///////////////////////////////////

    $result3=mysqli_query($conn,"SELECT * FROM `table` WHERE method = 'GET'");
    $num_rows3 = mysqli_num_rows($result3);
    array_push($data, $num_rows3); ////////////////////////////// # PER STATUS ///////////////////////////////////

    $result4 = mysqli_query($conn,"SELECT  COUNT(`status`) FROM `table` GROUP BY `status`");
    $num_rows4 = mysqli_num_rows($result4);
    array_push($data, $num_rows4);

    ////////////////////////////// Uniques Domains ///////////////////////////////////

    $result5 =mysqli_query($conn,"SELECT   COUNT(*) FROM `table` GROUP BY `domain` ");
    $num_rows5 = mysqli_num_rows($result5);
    array_push($data, $num_rows5);

    ////////////////////////////// Uniques Paroxoi ///////////////////////////////////
/* 
Σε σχολια διοτι δεν εχουμε στην βαση παροχους ως στηλη οποτε πεταει σφαλμα

    $result6 = mysqli_query($conn,"SELECT  COUNT(*) FROM `table` GROUP BY `paroxoi` ");
    $num_rows6 = mysqli_num_rows($result6);
    array_push($data, $num_rows6);
*/
   //////////////////////////////  Average Age ///////////////////////////////////

   $result7=mysqli_query($conn,"SELECT `content-type`,AVG(`age`) FROM `table` GROUP BY `content-type`");
   $num_rows7 = mysqli_num_rows($result7);
   array_push($data, $num_rows7);

    echo json_encode($data);
	
    mysqli_close($conn);
?>