<?php
require_once 'includes/conf.php';
include 'includes/user_creation.class.php';

$txtFName = $_POST['txtFName'];
$txtLName = $_POST['txtLName'];
$dropDept = $_POST['dropDept'];
$deptName = $_POST['deptName'];
$dateStart = $_POST['dateStart'];
$dropJobTitle = $_POST['dropJobTitle'];
$txtExtension = $_POST['txtExtension'];
$txtAssociateID = $_POST['txtAssociateID'];

$jobTitle = $dropJobTitle;

IF ($jobTitle == 'OTHER'){
	$txtJob = '<input type="text" name="txtJob">';
}
IF ($jobTitle <> 'OTHER'){
	$txtJob = '<input type="text" name="txtJob" value="'.WhatsTheTitle($jobTitle).'">';
}

require_once 'includes/header.php';
?>
<form enctype=multipart/form-data method=POST action=newuser_4.php>
User: <?php print($txtFName." ".$txtLName);?><br />
Department: <?php print($deptName);?><br />
Start Date: <?php print($dateStart);?><br />
Associate ID: <?php print($txtAssociateID);?><br />
Phone Number: 541-593-<?php print($txtExtension);?><br />
Title: <?php echo $txtJob;?><p />
<h2>Applications:</h2><p />
<?php GetAssignedAppsTable($dropJobTitle); ?>
<p />
<h2>Email Distribution:</h2><p />
<?php GetAssignedEmailDistros($dropJobTitle);?>
<p />
<h2>Drives:</h2><p />
<?php GetAssignedDrives($dropJobTitle);?>
<input type=hidden value="<?php echo $txtFName;?>" name="txtFName">
<input type=hidden value="<?php echo $txtLName;?>" name="txtLName">
<input type=hidden value="<?php echo $dropDept;?>" name="dropDept">
<input type=hidden value="<?php echo $dateStart;?>" name="dateStart">
<input type=hidden value="<?php echo $deptName;?>" name="deptName">
<input type=hidden value="<?php echo $txtExtension;?>" name="txtExtension">
<input type=hidden value="<?php echo $txtAssociateID;?>" name="txtAssociateID">
<input type=hidden value="<?php echo $dropJobTitle;?>" name="dropJobTitle">
<input type="submit">
</form>
<?php include 'includes/footer.php';?>