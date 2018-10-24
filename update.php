<?php
ob_start(); 
error_reporting(-1);
require_once('Connections/conndb.php');
session_start();



$username = $_POST['usernametxt'];
$password = base64_encode($_POST['passwordtxt']);
$id = base64_decode($_POST['hiddenField']);




if ($username == NULL || $password == NULL) {
header("location: register.php?error=1");
} else { 
$sql = "UPDATE User SET Myuser = ?, Mypass = ? WHERE id = ? ";
$sql_stmt=$conn->prepare($sql);
$sql_stmt->bind_param('sss', $username, $password, $id); 
$sql_stmt->execute();


if (!(isset($sql))) {
	header("location: ../../register.php?error=2");
} else {
	header("location: index.php");
}}

$conn->close();	
ob_flush();
?>