<?php
    // error_reporting(0);
    require '../conn.php';
    if(isset($_POST['upload'])){
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                //READ FILE
                $csvFile = fopen($_FILES['file']['tmp_name'],'r');
                // SKIP FIRST LINE
                fgetcsv($csvFile);
                // PARSE
                $error = 0;
                while(($line = fgetcsv($csvFile)) !== false){
                    $code = $line[0];
                      $process = $line[1];
                      $expiration_on_month = $line[2];
                      $authorization_no = $line[3];
                      $name = $line[4];
                      $falp_id = $line[5];
                      $sp_id = $line[6];
                      $batch_no = $line[7];
                      $status = $line[8];
                      $reason = $line[9];

                    // CHECK IF BLANK DATA
                    if($line[0] == '' || $line[1] == '' || $line[2] == '' || $line[3] == '' || $line[4] == '' || $line[5] == '' || $line[6] == '' || $line[7] == '' || $line[8] == '' || $line[9] == '' ){
                        // IF BLANK DETECTED ERROR += 1
                        $error = $error + 1;
                    }else{
                        // CHECK DATA
                    $prevQuery = "SELECT id FROM trs_renewal_request WHERE name = '$line[4]' AND  authorization_no = '$line[3]'";
                    $res = $conn->prepare($prevQuery);
                    $res->execute();
                    if($res->rowCount() > 0){
                        foreach($res->fetchALL() as $x){
                            $id = $x['id'];
                        }

                         $dates = new DAteTime($expiration_on_month);
                        $expiration_on_month = date_format($dates, "Y-m-d");


                        $update = "UPDATE trs_renewal_request SET code = '$code', process = '$process' , expiration_on_month ='$expiration_on_month', authorization_no = '$authorization_no', name = '$name', falp_id_no = '$falp_id', sp_id_no = '$sp_id', batch_no = '$batch_no', status = '$status', reason = '$reason' WHERE id ='$id'";
                        $stmt = $conn->prepare($update);
                        if($stmt->execute()){
                            $error = 0;
                        }else{
                            $error = $error + 1;
                        }
                        
                    }else{
                         $dates = new DAteTime($expiration_on_month);
                        $expiration_on_month = date_format($dates, "Y-m-d");

                        
                        $insert = "INSERT INTO trs_renewal_request (`code`,`process`,`expiration_on_month`,`authorization_no`,`name`,`falp_id_no`,`sp_id_no`,`batch_no`,`status`,`reason`) VALUES ('$code','$process','$expiration_on_month','$authorization_no','$name','$falp_id','$sp_id','$batch_no','$status','$reason')";
                        $stmt = $conn->prepare($insert);
                        if($stmt->execute()){
                            $error = 0;
                        }else{
                            $error = $error + 1;
                        }
                    }
                    }
                }
                
                 fclose($csvFile);
               if($error == 0){
                    echo '<script>
                    var x = confirm("SUCCESS! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../page/admin/import.php");
                    }else{
                        location.replace("../../page/admin/import.php");
                    }
                </script>'; 
               }else{
                    echo '<script>
                    var x = confirm("WITH ERROR! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../page/admin/import.php");
                    }else{
                        location.replace("../../page/admin/import.php");
                    }
                </script>'; 
               }
            }else{
                echo '<script>
                        var x = confirm("CSV FILE NOT UPLOADED! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/admin/import.php");
                        }else{
                            location.replace("../../page/admin/import.php");
                        }
                    </script>';
            }
        }else{
            echo '<script>
                        var x = confirm("INVALID FILE FORMAT! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/admin/import.php");
                        }else{
                            location.replace("../../page/admin/import.php");
                        }
                    </script>';
        }
        
    }

    // KILL CONNECTION
    $conn = null;
?>