<?php
require_once 'serverlogin.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
 die("Connection failed!" . mysqli_connect_error()); 
}
mysqli_select_db($conn, $db_database)
or die("Unable to select database: " . mysql_error());
?>