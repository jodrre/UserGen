<?php
require_once '../includes/conf.php';
require_once '../includes/header.php';

$outp_apps = mysqli_query($mysqli, "SELECT * FROM applications;");
?>
<h1>Applications</h1><P />
<table border="1">
<thead><tr><th>Application</th><th>Short</th><th>Active?</th></tr></thead>
<?php 
while ($row = mysqli_fetch_array($outp_apps)){
	$aname = $row['app_name'];
	$ashort = $row['app_short_name'];
	$aactive = $row['app_active'];
	echo "<tr><td>".$aname."</td><td>".$ashort."</td><td>".$aactive."</td></tr>";
};

?>


</table>







<h2>Add new application:</h2>
<form method=POST action=#>
Application Name: <input type=text name='txtAppName'><br />
Short Name: <input type=text name='txtAppShortName'><br />
<input type="submit" name='btnNew'>
</form>
<P><P>
<a href=back.php><button>Go Back</button></a>
<?php 
require_once '../includes/footer.php';
?>