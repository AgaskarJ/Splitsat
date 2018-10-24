<?php

ob_start(); 
require_once('../../Connections/conndb.php');
error_reporting(1);
$username=$_POST['user'];
$password=$_POST['pass'];

$username=($username);
$password=($password);
$password=$conn->real_escape_string($password);
$dpass=base64_encode($password);

$sql="SELECT id, Myuser, Mypass FROM User WHERE Myuser = ? And Mypass = ?";
$stmt=$conn->prepare($sql);
$stmt->bind_param('ss', $username, $dpass);
$stmt->execute();
$stmt->store_result(); 
$stmt->bind_result($id, $user, $pass);

if ($row=$stmt->fetch()) {
	session_start();
	$_SESSION['user'] = $user;
	header("location: ../../");  
	//echo "ok";
	exit();
} else {
	header("location: ../?login=error");
	//echo "failed";
	exit();
}


ob_flush();
?>