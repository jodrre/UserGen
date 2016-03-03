<?php

$dbhost = '192.168.0.2';
$dbuser = 'root';
$dbpass = '$kunk@P3';
$db = 'test';

// Enter the path to the CSS template file for the front-end
$site_theme_front = 'templates/main/main.css';
// Enter the path to the cSS template file for the back-end
$site_theme_back = 'templates/main/main.css';

$site_owner = 'SRR IT Department';


// Do not edit below this line
// -----------------------------


$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$db);
$UGver = '0.1.1';