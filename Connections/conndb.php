<?php 
$database_conndb = "SplitbyJay";
$username_conndb = "root";
$password_conndb = "root";
$hostname_conndb = "localhost";

$conn = new mysqli("$hostname_conndb", "$username_conndb", "$password_conndb", "$database_conndb", 3306);

if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}
?>