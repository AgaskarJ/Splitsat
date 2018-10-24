<?php
ob_start(); 
error_reporting(-1);
require_once('../../Connections/conndb.php');
session_start();

$name = $_POST['name'];
$surname = $_POST['surname'];
$gender = $_POST['radio'];
$email = $_POST['emailtxt'];
$joinx = $_POST['jointxt'];


if ($name == NULL) {
header("location: ../../register.php?error=1");
} else { 
$sql = "INSERT INTO User(Name, Surname, Gender, Email, JoinSS) VALUES(?, ?, ?, ?, ?)";
$sql_stmt=$conn->prepare($sql);
$sql_stmt->bind_param('sssss', $name, $surname, $gender, $email, $joinx); 
$sql_stmt->execute();


if (!(isset($sql))) {
	header("location: ../../register.php?error=2");
} else {
	header("location: ../../makenew.php?id=".base64_encode($conn->insert_id));
}}
	
ob_flush();
?>