<?php

$dbhost = '192.168.0.2'; // Database server FQDN, IP address, or localhost (default localhost)
$dbuser = 'root'; // User with read/write permissions to the database
$dbpass = '$kunk@P3'; // Password
$db = 'test'; // Database for UserGenerator


$mail_host = 'localhost'; // FQDN or IP address for mail server
$mail_port = '2525'; // SMTP port
$mail_auth = false;     // turn on SMTP authentication
$mail_username = "";  // SMTP username
$mail_password = ""; // SMTP password
$mail_from = "jodrre@gmail.com"; // Default email address
$mail_fromName = "Joe TEST"; // Name of default user

// Enter the path to the CSS template file for the front-end
$site_theme_front = 'templates/main/main.css';
// Enter the path to the cSS template file for the back-end
$site_theme_back = 'templates/main/main.css';

$site_owner = 'SRR IT Department';


// Do not edit below this line
// -----------------------------


$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$db);
$UGver = '0.1.2';