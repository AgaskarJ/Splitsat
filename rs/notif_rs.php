<?php 

$zero = 0;
$rsnotif = "SELECT nid, Notifwordid, Notifuserid, Notifread FROM Notifications WHERE Notifuserid = ? And Notifread = ?";
$notifexe=$conn->prepare($rsnotif);
$notifexe->bind_param('ss', $uid, $zero);
$notifexe ->execute();
$notifexe ->store_result();
$notifexe ->bind_result($nid, $notifword, $notifuser, $notifread);
$notifexe ->fetch();


function notifclose() {
	$notifexe ->close();
}


?> 