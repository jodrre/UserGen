<?php
require_once 'includes/conf.php';
?>
<html>
<head>
<title>User Access Site - SRR IT Dept</title>
<!-- <link rel='stylesheet' type='text/css' <?php echo 'href='.$site_theme_front;?>> -->
</head>
<body>
		<div id=wrapper>
<div id=header-wrapper class=container>

<div class=banner>Sunriver Resort User Access</div>
<div class=boxA><h2>New Users</h2><br>For new users, click here:<p><a href=newuseraccess.php class='button'>New user</a></div>
<div class=boxB><h2>Existing Users</h2>To change access for an existing user, click here:<p><a href=changeaccess.php class='button'>Change access</a>.</div>
<div class=boxC><h2>Access Termination</h2>To remove access for a user, click here:<p><a href=removeaccess.php class='button'>Terminate access</a></div>

</div>
</div>
<?php require_once 'includes/footer.php';?>