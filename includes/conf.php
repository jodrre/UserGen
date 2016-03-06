<?php

$dbhost = '192.168.0.2';
$dbuser = 'root';
$dbpass = '$kunk@P3';
$db = 'test';

$mail_host = 'localhost';
$mail_port = '2525';
$mail_auth = false;     // turn on SMTP authentication
$mail_username = "";  // SMTP username
$mail_password = ""; // SMTP password
$mail_from = "jodrre@gmail.com";
$mail_fromName = "Joe TEST";

// Enter the path to the CSS template file for the front-end
$site_theme_front = 'templates/main/main.css';
// Enter the path to the cSS template file for the back-end
$site_theme_back = 'templates/main/main.css';

$site_owner = 'SRR IT Department';


// Do not edit below this line
// -----------------------------


$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$db);
$UGver = '0.1.2';

require_once ('class.phpmailer.php');
$mail_errorreport = "It looks like something has gone wrong. Please send the following error to IT for troubleshooting: ".$mail->ErrorInfo;