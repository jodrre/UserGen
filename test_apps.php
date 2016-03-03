<?php
require_once 'includes/conf.php';
require_once 'includes/header.php';
require_once 'includes/user_creation.class.php';

$dropDept = '666';
$dropJobTitle = '17';


$SQL_assigned = "SELECT * FROM drives ORDER BY drive_letter;";
$outp_assigned = mysqli_query($mysqli,$SQL_assigned);

while($row=mysqli_fetch_array($outp_assigned)){
	echo "<input type=checkbox name='Drive[]' value='".$row['drive_id']."'";
	$SQL_lookAssign = "SELECT drive_assign_drive FROM job_drive_assignments WHERE drive_assign_job = '".$dropJobTitle."' AND drive_assign_id = '".$row['drive_id']."';";
	$lookAssign = $mysqli->query($SQL_lookAssign);
	$lookAssign = mysqli_fetch_all($lookAssign);
	$lookAssign = $lookAssign[0];
	If($lookAssign >0){
		echo " checked>";
	}
	Else{
		echo ">";
	}
	echo $row['drive_letter']." - ".$row['drive_share'];
	echo "<br>
				";
}






?>



<?php 
require_once 'includes/footer.php';
?>