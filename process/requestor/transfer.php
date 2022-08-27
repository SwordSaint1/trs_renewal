<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_sched_transfer_req') {
	$start = $_POST['start'];
	$shift = $_POST['shift'];
	$requested_by = $_POST['requested_by'];
	$c = 0;
	// $query = "SELECT *,TIME_FORMAT(start_time, '%H:%i:%s') as start_time, TIME_FORMAT(end_time, '%H:%i:%s') as end_time FROM trs_renewal_sched WHERE start_date LIKE '$start%' AND shift LIKE '$shift%' AND sched_stat = 0";
	$query = "SELECT trs_renewal_sched.id,trs_renewal_sched.training_code,trs_renewal_sched.shift,trs_renewal_sched.start_date,trs_renewal_sched.end_date,
trs_renewal_sched.start_time,TIME_FORMAT(trs_renewal_sched.start_time, '%H:%i:%s') as start_time,trs_renewal_sched.end_time, TIME_FORMAT(trs_renewal_sched.end_time, '%H:%i:%s') as end_time,trs_renewal_sched.location,trs_renewal_sched.trainer,trs_renewal_sched.slot,trs_renewal_request.tr_code
FROM trs_renewal_sched
LEFT JOIN trs_renewal_request ON trs_renewal_request.tr_code = trs_renewal_sched.training_code
WHERE trs_renewal_sched.start_date LIKE '$start%' AND trs_renewal_sched.shift LIKE '$shift%' AND trs_renewal_request.exam_status = 'Failed' AND trs_renewal_request.ft_status = 0 AND trs_renewal_sched.sched_stat = 0 AND trs_renewal_request.final_status = 'Transfer' AND trs_renewal_request.requested_by = '$requested_by' GROUP BY trs_renewal_sched.training_code";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr style="cursor:pointer;  class="modal-trigger" data-toggle="modal" data-target="#transfer_req" onclick="get_transfer_req_details(&quot;'.$j['id'].'~!~'.$j['training_code'].'~!~'.$j['shift'].'~!~'.$j['start_date'].'~!~'.$j['end_date'].'~!~'.$j['start_time'].'~!~'.$j['end_time'].'~!~'.$j['location'].'~!~'.$j['trainer'].'~!~'.$j['slot'].'&quot;)">';
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


if ($method == 'fetch_prev_transfer_req') {
	$tr_code = $_POST['tr_code'];
	$requested_by = $_POST['requested_by'];
	$c = 0;
	$query = "SELECT * FROM trs_renewal_request WHERE tr_code = '$tr_code' AND final_status = 'Transfer' AND ft_status = 0 AND exam_status = 'Failed' AND requested_by = '$requested_by'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['code'].'</td>';
				echo '<td>'.$j['process'].'</td>';
				echo '<td>'.$j['expiration_on_month'].'</td>';
				echo '<td>'.$j['authorization_no'].'</td>';
				echo '<td>'.$j['name'].'</td>';
				echo '<td>'.$j['falp_id_no'].'</td>';
				echo '<td>'.$j['sp_id_no'].'</td>';
				echo '<td>'.$j['exam_status'].'</td>';
				echo '<td>'.$j['attendance_status'].'</td>';
				echo '<td>'.$j['final_status'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="10" style="color:red;">No Result!<td>';
			echo '</tr>';
	}
}
$conn = NULL;
?>