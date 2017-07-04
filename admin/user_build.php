<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';
$uid = $_GET['id'];

// First process any logins that get redirected here.
// At some point may need to do a lookup to see if the username is already taken and active, may be on the create page or a function.


// app_login_id, app_id, user_id, username, masteraccount, temp_pass, login_active, login_created

// Set the completion status to true, will be false if any assigned apps don't have a login.
$UserReady = 1;

// Some base info so we know who we're looking at...

$UserNameSQL = "SELECT CONCAT(user_FName,' ',user_LName), user_dept, user_text_title FROM users WHERE user_id = ".$uid.";";
$GetUserName = mysqli_query($mysqli,$UserNameSQL);
$GetUserName = mysqli_fetch_array($GetUserName);
$UserDept = $GetUserName['user_dept'];
$GetDepartmentSQL = "SELECT department_name FROM departments WHERE department_id = ".$UserDept.";";
$GetDepartment = mysqli_query($mysqli,$GetDepartmentSQL);
$GetDepartment = mysqli_fetch_array($GetDepartment);

echo "<b>Name:</b> ".$GetUserName[0]."<br />";
echo "<b>Department:</b> ".$GetDepartment[0]."<br />";
echo "<b>Job Title:</b> ".$GetUserName['user_text_title']."<p />";

// Need to query what apps the user assigned
// If exists, then print the username
// If not exists, link to create a new record

$getAppsSQL = 'SELECT app_id FROM users_apps WHERE user_id = '.$uid.';';
$AppsOutp = mysqli_query($mysqli, $getAppsSQL);

echo "<table>
		<tr><th>Application</th><th>Login</th></tr>";

while ($row = mysqli_fetch_array($AppsOutp)) {
	$AppNameSQL = 'SELECT app_name FROM applications WHERE app_id = '.$row[0].';';
	$AppOut = mysqli_query($mysqli,$AppNameSQL);
	$AppOut = mysqli_fetch_array($AppOut);
	echo "<tr><td>";
	echo $AppOut[0];
	echo "</td>";
	$CheckIfExistsSQL = 'SELECT * FROM app_logins WHERE user_id = '.$uid.' AND app_id = '.$row[0].';';
	$Exists = mysqli_query($mysqli,$CheckIfExistsSQL);
	$Exists = mysqli_fetch_array($Exists);
	$ExistsUser = $Exists['username'];
	echo "<td>";
		If ($ExistsUser == NULL) {
			echo "<a href='create_login.php?user=".$uid."&app=".$row[0]."'>Create Login</a>";
			$UserReady = 0;
		}
		Else {
			echo $ExistsUser;
		}
	echo "</td></tr>
			";
}
echo "</table>";
If ($UserReady == 1) {
	echo "User ready. Need to do an insert thing. This text is here for now because meh. Or I horked something up and it's not passing something. Blargh.";
}

