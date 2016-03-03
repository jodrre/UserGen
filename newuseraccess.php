<?php
require_once('includes/conf.php');
require_once('includes/header.php');
echo "<html><head>";
$sql = 'SELECT * FROM departments;';
$outp = mysqli_query($mysqli, $sql);
?>
<form enctype=multipart/form-data method=POST action=newuser_2.php>
<div id=employee_data>
Last name: <input type=text name="txtLName" required> First name: <input type=text name="txtFName" required><br>
Start Date: (mm/dd/yyyy) <input type=date name="dateStart" required><br>
Department:	<select name="dropDept" required>	
		<option selected value="">--Choose a department--</option>
<?php while($row = mysqli_fetch_array($outp)) {
	echo "		<option value=".$row[0].">".$row[0]." - ".$row[1]."</option>
		";
} ?>
	</select><br>
	
</div>	
<input type=submit>
</form>
<?php require_once 'includes/footer.php';?>