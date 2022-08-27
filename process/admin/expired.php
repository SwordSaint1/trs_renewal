<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_expired') {
	$name = $_POST['name'];
	$process = $_POST['process'];
	$c = 0;
	$query = "SELECT * FROM trs_renewal_request WHERE name LIKE '$name%' AND process LIKE '$process%' AND exam_status IS NULL AND expiration_on_month < '$server_date_only'";
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
				echo '<td>'.$j['batch_no'].'</td>';
				echo '<td>Expired</td>';
				echo '<td>'.$j['reason'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="11" style="color:red;">No Result!<td>';
			echo '</tr>';
	}
}

$conn = NULL;

?>