<?php
ob_start(); 
require_once('../../Connections/conndb.php');
session_start();

$typet = $_POST['type'];

if ($typet == NULL) {
header("location: ../logged.php?error=1");
} else { 
$sql = "INSERT INTO Type(Type) VALUES(?)";
$sql_stmt=$conn->prepare($sql);
$sql_stmt->bind_param('s', $typet); 
$sql_stmt->execute();
}

if (!(isset($sql))) {
	header("location: ../logged.php?error=2");
} else {
	header("location: ../logged.php?result=ok");
}
	
ob_flush();
?>