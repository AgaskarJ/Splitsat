<?php
ob_start(); 
require_once('../../Connections/conndb.php');
session_start();

$category = $_POST['category'];

if ($category == NULL) {
header("location: ../logged.php?error=1");
} else { 
$sql = "INSERT INTO Cate(Categories) VALUES(?)";
$sql_stmt=$conn->prepare($sql);
$sql_stmt->bind_param('s', $category); 
$sql_stmt->execute();
}

if (!(isset($sql))) {
	header("location: ../logged.php?error=2");
} else {
	header("location: ../logged.php?result=ok");
}
	
ob_flush();
?>