<?php
ob_start(); 
require_once('../../Connections/conndb.php');
session_start();

$keywords = $_POST['word'];
$meaning = $_POST['meaning'];
$categoryk = $_POST['category'];
$typek = $_POST['type'];
$sentence = $_POST['sentence'];

if ($categoryk == NULL && $keywords == NULL && $meaning == NULL && $typek == NULL) {
header("location: ../logged.php?error=1");
} else { 
$sql = "INSERT INTO Keywords(Word, Meaning, Category, Type) VALUES(?,?,?,?)";
$sql_stmt=$conn->prepare($sql);
$sql_stmt->bind_param('ssss', $keywords, $meaning, $categoryk, $typek); 
$sql_stmt->execute();
}

if (!(isset($sql))) {
	header("location: ../logged.php?error=2");
} else {
	
	$mysqlid = $conn->insert_id;
	$sql2 = "INSERT INTO Sentences(senid, sentence) VALUES(?,?)";
	$sql2_stmt=$conn->prepare($sql2);
	$sql2_stmt->bind_param('ss', $mysqlid, $sentence); 
	$sql2_stmt->execute();
	
	if (isset($sql2_stmt)) {
		header("location: ../logged.php?result=ok"); 
		}
	
}
	
ob_flush();
?>