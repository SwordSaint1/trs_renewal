<?php
    $servername = 'localhost';
    $username = 'root';
    $pass = 'trspassword2022';
    date_default_timezone_set('Asia/Manila');
    $server_date_time = date('Y-m-d H:i:s');
    $server_date_only = date('Y-m-d');
    $server_time = date('H:i:s');
    $server_year = date('Y');
    $dateqr = date('Ymd');
   
    try {
        $conn2 = new PDO ("mysql:host=$servername;dbname=trs_db",$username,$pass);

  //        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
  
    }catch(PDOException $e){
        echo 'NO CONNECTION'.$e->getMessage();
    }
?>