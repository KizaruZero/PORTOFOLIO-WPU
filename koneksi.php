<?php
$db_host = 'localhost';
$db_name = 'skd-login';
$db_username = 'root';
$db_password = '';
$db_role = $db_role ?? 'user';
$mysqli = mysqli_connect($db_host, $db_username, $db_password,$db_name);
?>


