<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_for_auth') {
	$start = $_POST['start'];
	$shift = $_POST['shift'];
	$c = 0;
	$query = "SELECT *,TIME_FORMAT(start_time, '%H:%i:%s') as start_time, TIME_FORMAT(end_time, '%H:%i:%s') as end_time FROM trs_renewal_sched WHERE start_date LIKE '$start%' AND shift LIKE '$shift%' AND sched_stat = 1";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr style="cursor:pointer;  class="modal-trigger" data-toggle="modal" data-target="#for_authorization" onclick="get_for_authorization_details(&quot;'.$j['id'].'~!~'.$j['training_code'].'~!~'.$j['shift'].'~!~'.$j['start_date'].'~!~'.$j['end_date'].'~!~'.$j['start_time'].'~!~'.$j['end_time'].'~!~'.$j['location'].'~!~'.$j['trainer'].'~!~'.$j['slot'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['training_code'].'</td>';
				echo '<td>'.$j['shift'].'</td>';
				echo '<td>'.$j['slot'].'</td>';
				echo '<td>'.$j['start_date'].'</td>';
				echo '<td>'.$j['start_time'].'</td>';
				echo '<td>'.$j['location'].'</td>';
				echo '<td>'.$j['trainer'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="10" style="color:red;">No Result!<td>';
			echo '</tr>';
	}
}

if ($method == 'fetch_prev_auth') {
	$tr_code = $_POST['tr_code'];
	$c = 0;
	$query = "SELECT * FROM trs_renewal_request WHERE tr_code = '$tr_code' AND exam_status IS NULL or exam_status = 'Ongoing'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr>';
				 echo '<td>';
                echo '<p>
                        <label>
                            <input type="checkbox" name="" id="" class="singleCheck" value="'.$j['id'].'">
                            <span></span>
                        </label>
                    </p>';
                echo '</td>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['code'].'</td>';
				echo '<td>'.$j['process'].'</td>';
				echo '<td>'.$j['expiration_on_month'].'</td>';
				echo '<td>'.$j['authorization_no'].'</td>';
				echo '<td>'.$j['name'].'</td>';
				echo '<td>'.$j['falp_id_no'].'</td>';
				echo '<td>'.$j['sp_id_no'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="10" style="color:red;">No Result!<td>';
			echo '</tr>';
	}
}

if ($method == 'count_row') {
	$tr_code = $_POST['tr_code'];

	$query = "SELECT COUNT(*) AS total FROM trs_renewal_request WHERE tr_code = '$tr_code' AND exam_status IS NULL OR exam_status = 'Ongoing'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		foreach($stmt->fetchALL() as $j){
			echo $count = $j['total'];
		}
	}
}

if ($method == 'close_schedule') {
	$tr_code = $_POST['tr_code'];

	$query = "UPDATE trs_renewal_sched SET sched_stat = 0 WHERE training_code = '$tr_code'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

if ($method == 'authorization') {
    $id = [];
    $id = $_POST['id'];
   	$attendance_status = $_POST['attendance_status'];
   	$exam_status = $_POST['exam_status'];
    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);
    foreach($id as $x){
    	if ($attendance_status == 'Attend') {
    		$query = "UPDATE trs_renewal_request SET exam_status = '$exam_status', attendance_status = '$attendance_status', attend = 1 WHERE id = '$x'";
    		$stmt = $conn->prepare($query);
    		if ($stmt->execute()) {
    			$count = $count - 1;
    		}else{

    		}
    	}elseif($attendance_status == 'Did_not_Attend'){
    		$query2 = "UPDATE trs_renewal_request SET exam_status = '$exam_status', attendance_status = '$attendance_status', not_attend = 1 WHERE id = '$x'";
    		$stmt2 = $conn->prepare($query2);
    		if ($stmt2->execute()) {
    			$count = $count - 1;
    		}
    	}else{
    		$query3 = "UPDATE trs_renewal_request SET exam_status = '$exam_status', attendance_status = '$attendance_status', attend = 1 WHERE id = '$x'";
    		$stmt3 = $conn->prepare($query3);
    		if ($stmt3->execute()) {
    			$count = $count - 1;
    		}else{

    		}
    	}

        }
        if($count == 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }


$conn = NULL;
?>