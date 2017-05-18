<?php

$dbhost = '192.168.0.13'; // Database server FQDN, IP address, or localhost (default localhost)
$dbuser = 'usergen'; // User with read/write permissions to the database
$dbpass = 'Password123'; // Password
$db = 'test'; // Database for UserGenerator


$mail_host = 'localhost'; // FQDN or IP address for mail server
$mail_port = '2525'; // SMTP port
$mail_auth = false;     // turn on SMTP authentication
$mail_username = "";  // SMTP username
$mail_password = ""; // SMTP password
$mail_from = "usergen@company.com"; // Default email address
$mail_fromName = "UserGen TEST"; // Name of default user
$mail_ITDepartment_email = "it_department@company.com";

// Enter the path to the CSS template file for the front-end
$site_theme_front = 'templates/main/main.css';
// Enter the path to the CSS template file for the back-end
$site_theme_back = '../templates/main/main.css';

$site_owner = 'SRR IT Department';


// Do not edit below this line
// -----------------------------


$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$db);
$UGver = '0.1.3 (beta)';
