<?php
require_once 'includes/conf.php';
require_once 'includes/header.php';

$sql = 'SELECT * FROM job_titles WHERE job_dept='.$_POST['dropDept'].';';
$outp = mysqli_query($mysqli, $sql);


// Pull previous page data for reasons, will be stored later
// Maybe in the future on we immediately store the data from the last page and just reference the row from a SQL query
// Would definitely make life a lot easier...

$txtFName = $_POST['txtFName'];
$txtLName = $_POST['txtLName'];
$dropDept = $_POST['dropDept'];
$dateStart = $_POST['dateStart'];

$SQL_dept = "SELECT department_name FROM departments WHERE department_id =".$dropDept.";";
$deptquery = mysqli_query($mysqli,$SQL_dept);
$deptName = mysqli_fetch_array($deptquery);

?>
<h1>Step 2</h1><br />
<header>On this page we will ask for a little bit more information:</header><br />
<article>Access form for <?php echo($txtFName." ".$txtLName.' in '.$deptName[0]." starting on ".$dateStart.".");?></article>
<form enctype=multipart/form-data method=POST action=newuser_3.php>
<input type=hidden value=<?php echo $txtFName;?> name="txtFName">
<input type=hidden value="<?php echo $txtLName;?>" name="txtLName">
<input type=hidden value="<?php echo $dropDept;?>" name="dropDept">
<input type=hidden value="<?php echo $dateStart;?>" name="dateStart">
<input type=hidden value="<?php echo $deptName[0];?>" name="deptName">

Job Title: 
<select name="dropJobTitle" required>	
		<option selected value="">--Choose a title--</option>
<?php while($row = mysqli_fetch_array($outp)) {
	echo "		<option value=".$row[0].">".$row[0]." - ".$row[1]."</option>
		";
} ?>
<option value="OTHER">--Other</option>
	</select><br>
<ul><li>If a job title does not exist, choose Other and enter on the next page.</li></ul><br />
Primary Extension: <input name="txtExtension" type=text maxlength=4><br />
Associate ID:<input name="txtAssociateID" maxlength="6" type="text" /><br />
<input type=submit>
</form>
<?php require_once 'includes/footer.php';?>