<?php

function WhatsTheTitle($job){
	global $mysqli;
	$sql = "SELECT job_title_name FROM job_titles WHERE job_title_id = ".$job.";";
	$outp = mysqli_query($mysqli,$sql);
	$outp = mysqli_fetch_array($outp);
	$outp = $outp['job_title_name'];
	return $outp;
}

function GetAssignedAppsTable($job){
	// Pulls list of currently active applications
	// Checks to see if job is assigned the application
	// Checks box
	
	// Returns a bunch of checkboxes

	global $mysqli;
	If ($job !== 'OTHER') {
		
	$SQL_assigned = "SELECT * FROM job_app_assignments INNER JOIN applications ON job_app_assignments.assignment_app = applications.app_short_name WHERE applications.app_active = 1 AND job_app_assignments.assignment_job_id = ".$job." ORDER BY app_group_number, app_name;";
	$outp_assigned = mysqli_query($mysqli,$SQL_assigned);
	
	while($row=mysqli_fetch_array($outp_assigned)){
		echo "<input type=checkbox name='App[]' value='".$row['assignment_app']."'";
		If($row['app_assigned']==1){
			echo " checked>";
		}
		Else{
			echo ">";
		}
		echo $row['app_name'];
		echo "<br>
				";	
	}
	}
	$SQL_allapps = "SELECT * FROM applications WHERE app_active = 1 ORDER BY app_group_number, app_name;";
	$outp_assigned = mysqli_query($mysqli, $SQL_allapps);
	while($row=mysqli_fetch_array($outp_assigned)){
		echo "<input type=checkbox name='App[]' value='".$row['app_short_name']."'>".$row['app_name']."<br>";
	}
}
	
function GetAssignedEmailDistros($job) {
	
	global $mysqli;
	
	$SQL_assigned = "SELECT * FROM distros ORDER BY distro_name;";
	$outp_assigned = mysqli_query($mysqli,$SQL_assigned);
	
	while($row=mysqli_fetch_array($outp_assigned)){
		echo "<input type=checkbox name='Distro[]' value='".$row['distro_id']."'";
		$SQL_lookAssign = "SELECT distro_id FROM job_distro_assignments WHERE distro_job_id = '".$job."' AND distro_id = '".$row['distro_id']."';";
		$lookAssign = $mysqli->query($SQL_lookAssign);
		$lookAssign = mysqli_fetch_array($lookAssign);
		$lookAssign = $lookAssign[0];
		If($lookAssign > 0){
			echo " checked>";
		}
		Else{
			echo ">";
		} 
		echo $row['distro_name'];
		echo "<br>
				";
	}
}

function GetAssignedDrives($job){
	// Pulls list of currently active applications
	// Checks to see if job is assigned the application
	// Checks box

	// Returns a bunch of checkboxes

	global $mysqli;

	$SQL_assigned = "SELECT * FROM drives ORDER BY drive_letter;";
	$outp_assigned = mysqli_query($mysqli,$SQL_assigned);

	while($row=mysqli_fetch_array($outp_assigned)){
		echo "<input type=checkbox name='Drive[]' value='".$row['drive_id']."'";
		$SQL_lookAssign = "SELECT drive_assign_drive FROM job_drive_assignments WHERE drive_assign_job = '".$job."' AND drive_assign_id = '".$row['drive_id']."';";
		$lookAssign = $mysqli->query($SQL_lookAssign);
		$lookAssign = mysqli_fetch_array($lookAssign);
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
}

function BreakOutApps ($array) {
	// Breaks out array from app selection
	// Returns as list items
	
	global $mysqli;
	
	echo "<ul>";
	
	foreach ($array as $app) {
		$app_lookupSQL = "SELECT app_name FROM applications WHERE app_short_name = '".$app."';";
		$app_l = $mysqli->query($app_lookupSQL);
		$app_l = mysqli_fetch_all($app_l);
		foreach ($app_l as $item){
			echo "<li>";
			echo $item[0];
			echo "</li>";
		}
		}
				
	echo "</ul>";
}

function BreakOutDistros ($array) {
	// Breaks out array from distro selection
	// Returns as list items

	global $mysqli;

	echo "<ul>";

	foreach ($array as $distro) {
		$distro_lookupSQL = "SELECT distro_name FROM distros WHERE distro_id = '".$distro."';";
		$distro_l = $mysqli->query($distro_lookupSQL);
		$distro_l = mysqli_fetch_all($distro_l);
		foreach ($distro_l as $item){
			echo "<li>";
			echo $item[0];
			echo "</li>";
		}
	}

	echo "</ul>";
}

function BreakOutDrives ($array) {
	// Breaks out array from drive selection
	// Returns as list items

	global $mysqli;

	echo "<ul>";

	foreach ($array as $drive) {
		$drive_lookupSQL = "SELECT drive_letter,drive_share FROM drives WHERE drive_id = '".$drive."';";
		$drive_l = $mysqli->query($drive_lookupSQL);
		$drive_l = mysqli_fetch_all($drive_l);
		foreach ($drive_l as $item){
			echo "<li>";
			echo $item[1]." (".$item[0].")";
			echo "</li>";
		}
	}

	echo "</ul>";
}	
	
function TheFinalInsertion(){
	global $mysqli;
	$txtFName = $_POST['txtFName'];
	$txtLName = $_POST['txtLName'];
	$dropDept = $_POST['dropDept'];
	$dateStart = $_POST['dateStart'];
	$dropJobTitle = $_POST['dropJobTitle'];
	$txtJob = $_POST['txtJob'];
	$txtExtension = $_POST['txtExtension'];
	$txtAssociateID = $_POST['txtAssociateID'];
	$App = $_POST['App'];
	$Distro = $_POST['Distro'];
	$Drive = $_POST['Drive'];

	
	If ($dropJobTitle == 'OTHER') {
		$dropJobTitle = 0;
	}
	// Create the user record first!
		$insert_userSQL = 'INSERT INTO users (user_LName, user_FName, user_dept, user_job, user_badge, user_extension, user_startdate, user_text_title) 
			VALUES ("'.$txtLName.'", "'.$txtFName.'", "'.$dropDept.'", "'.$dropJobTitle.'", "'.$txtAssociateID.'", "'.$txtExtension.'", "'.$dateStart.'", "'.$txtJob.'");';
		mysqli_query($mysqli, $insert_userSQL);
	// This gives us the row number for the newly created user!
		$lastID = $mysqli->insert_id;

	// Applications are next
	$App_array = explode('|', $App);
			foreach ($App_array as $app_item) {
					$app_lookupSQL = "SELECT app_id FROM applications WHERE app_short_name = '".$app_item."';";
					$app_l = $mysqli->query($app_lookupSQL);
					$app_l = mysqli_fetch_all($app_l);
					$app_b = $app_l[0];
					$app_a = $app_b[0];
					$app_ins_sql = 'INSERT INTO users_apps (user_id, app_id) VALUES ("'.$lastID.'", "'.$app_a.'");';
					$mysqli->query($app_ins_sql);
			}		
			
	// Email distros are third
	$Distro_array = explode('|', $Distro);
		foreach ($Distro_array as $distro_a) {
			$distro_ins_sql = 'INSERT INTO users_distros (user_id, distro_id) VALUES ("'.$lastID.'", "'.$distro_a.'");';
			$mysqli->query($distro_ins_sql);
		}
		
	// Drives are last but not least
	$Drive_array = explode('|', $Drive);
		foreach ($Drive_array as $drives_a) {
			$drives_ins_sql = 'INSERT INTO users_drives (user_id, drive_id) VALUES ("'.$lastID.'", "'.$drives_a.'");';
			$mysqli->query($drives_ins_sql);
		}
	include 'user_notification.class.php';
	EmailIt($lastID, 1);
}
	