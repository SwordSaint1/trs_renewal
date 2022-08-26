<?php 
include '../conn.php';

$method = $_POST['method'];

if($method == 'trcode'){
		$prefix = "SC:";
		$dateCode = date('ymd');
		$randomCode = mt_rand(100,500);
		echo $prefix."".$dateCode."".$randomCode;
	}

if ($method == 'register_schedule') {
	$trainer = $_POST['trainer'];
	$location = $_POST['location'];
	// $process = $_POST['process'];
	$shift = $_POST['shift'];
	$slot = $_POST['slot'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$user = $_POST['user'];
	$training_code = $_POST['training_code'];
	$c = 0;

	$check = "SELECT id FROM trs_renewal_sched WHERE training_code = '$training_code' AND shift = '$shift' AND start_date = '$start_date' AND end_date = '$end_date' AND start_time = '$start_time' AND end_time = '$end_time' AND location = '$location' AND slot = '$slot' ";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Already Exist';
	}else{
		$query = "INSERT INTO trs_renewal_sched (`shift`,`slot`,`start_date`,`end_date`,`start_time`,`end_time`,`sched_stat`,`trainer`,`location`,`created_by`,`training_code`) VALUES ('$shift', '$slot','$start_date','$end_date','$start_time','$end_time',1,'$trainer','$location','$user','$training_code')";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
}

if ($method == 'fetch_schedule') {
	$start = $_POST['start'];
	$c = 0;
	$query = "SELECT *,TIME_FORMAT(start_time, '%H:%i:%s') as start_time, TIME_FORMAT(end_time, '%H:%i:%s') as end_time FROM trs_renewal_sched WHERE start_date LIKE '$start%' AND sched_stat = 1";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_scheduless" onclick="get_update_schedules(&quot;'.$j['id'].'~!~'.$j['training_code'].'~!~'.$j['shift'].'~!~'.$j['start_date'].'~!~'.$j['end_date'].'~!~'.$j['start_time'].'~!~'.$j['end_time'].'~!~'.$j['location'].'~!~'.$j['trainer'].'~!~'.$j['slot'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['training_code'].'</td>';
				echo '<td>'.$j['shift'].'</td>';
				echo '<td>'.$j['start_date'].'</td>';
				echo '<td>'.$j['end_date'].'</td>';
				echo '<td>'.$j['start_time'].'</td>';
				echo '<td>'.$j['end_time'].'</td>';
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

if ($method == 'update_schedule') {
	$user = $_POST['user'];
	$id = $_POST['id'];
	$training_code = $_POST['training_code'];
	// $process = $_POST['process'];
	$shift = $_POST['shift'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$location = $_POST['location'];
	$trainer = $_POST['trainer'];
	$slot = $_POST['slot'];

	$check = "SELECT id FROM trs_renewal_sched WHERE training_code = '$training_code' AND shift = '$shift' AND start_date = '$start_date' AND end_date = '$end_date' AND start_time = '$start_time' AND end_time = '$end_time' AND location = '$location' AND slot = '$slot'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Already Exist';
	}else{
		$query = "UPDATE trs_renewal_sched SET shift = '$shift', slot = '$slot', start_date = '$start_date', end_date = '$end_date', start_time = '$start_time', end_time = '$end_time', trainer = '$trainer', location = '$location', updated_by = '$user' WHERE id = '$id'";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
}
$conn = NULL;
?>