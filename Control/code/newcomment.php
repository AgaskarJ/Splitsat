<?php
ob_start(); 
error_reporting(1);
require_once('../../Connections/conndb.php');
session_start();

$userid = $_POST['userid'];
$wordid = $_POST['wordid'];
$comment = $_POST['entercomment'];

$Notifmessage = "You have a new Notification!";

//Notifications
$rsnotif="SELECT id, wordid, userid FROM Comments WHERE wordid = ? GROUP BY userid";
$notifexe=$conn->prepare($rsnotif);
$notifexe->bind_param('s',$wordid);
$notifexe->execute();
$notifexe->store_result();
$notifexe->bind_result($nid, $notifwordid, $notifuserid);

if ($comment == NULL) {
header("location: ../../comments.php?error=1");
} else { 
$sql = "INSERT INTO Comments(userid, wordid, comments) VALUES(?,?,?)";
$sql_stmt=$conn->prepare($sql);
$sql_stmt->bind_param('sss', $userid, $wordid, $comment); 
$sql_stmt->execute();


if (!(isset($sql))) {
	header("location: ../../comments.php?$wordid&error=2");

} else {
	while($notifexe->fetch()) {
$nsql="INSERT INTO Notifications(Notifuserid, Notifwordid, Message) VALUES(?,?,?)";
$nsql_stmt=$conn->prepare($nsql);
$nsql_stmt->bind_param('sss', $notifuserid, $notifwordid, $Notifmessage); 
$nsql_stmt->execute();

header("location: ../../comments.php?wordid=$wordid");

	}

	/*$Notifmessage = "You have a new Notification!";
	$Notifsql = "INSERT INTO Notifications(Notifwordid, Notifuserid, Message) VALUES(?,?,?)";
$sql_Notifsql=$conn->prepare($Notifsql);
$sql_Notifsql->bind_param('sss', $wordid, $userid, $Notifmessage); 
$sql_Notifsql->execute();

	header("location: ../../comments.php?wordid=$wordid");*/
}
}
$notifexe->close();	
ob_flush();
?>