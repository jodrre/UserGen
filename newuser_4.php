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
$App = $_POST['App'];
$App_array = implode('|',$_POST['App']);
$Distro = $_POST['Distro'];
$Distro_array = implode('|',$_POST['Distro']);
$Drive = $_POST['Drive'];
$Drive_array =  implode('|',$_POST['Drive']);
require_once 'includes/header.php';

?>

<form enctype=multipart/form-data method=POST action=new_user_submit.php>
<input type=hidden value="<?php echo $txtFName;?>" name="txtFName">
<input type=hidden value="<?php echo $txtLName;?>" name="txtLName">
<input type=hidden value="<?php echo $dropDept;?>" name="dropDept">
<input type=hidden value="<?php echo $dateStart;?>" name="dateStart">
<input type=hidden value="<?php echo $deptName;?>" name="deptName">
<input type=hidden value="<?php echo $txtExtension;?>" name="txtExtension">
<input type=hidden value="<?php echo $txtAssociateID;?>" name="txtAssociateID">
<input type=hidden value="<?php echo $dropJobTitle;?>" name="dropJobTitle">
<input type=hidden value="<?php echo $App_array;?>" name="App">
<input type=hidden value="<?php echo $Distro_array;?>" name="Distro">
<input type=hidden value="<?php echo $Drive_array;?>" name="Drive">

Please confirm the information below is listed correctly before submitting.<p>
<h3>User Information:</h3>
<?php 
echo "<b>Name:</b> ".$txtFName." ".$txtLName."<br />";
echo "<b>Title:</b> ".WhatsTheTitle($dropJobTitle)."<br />";
echo "<b>Start date:</b> ".$dateStart."<br />";
echo "<b>Extension:</b> ".$txtExtension."<br />";
echo "<b>Associate ID:</b> ".$txtAssociateID."<br />";
?>
<p /><h3>Applications:</h3>
<?php BreakOutApps($App);?>
<p /><h3>Distribution Lists:</h3>
<?php BreakOutDistros($Distro);?>
<p /><h3>Drives:</h3>
<?php BreakOutDrives($Drive);?>
<input type="submit">
</form>


<?php include_once 'includes/footer.php';?>