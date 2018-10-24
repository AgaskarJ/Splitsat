<?php 

//USERS
$rsusers = "SELECT id, Myuser, Name, Surname, Level FROM User WHERE Myuser = ?";
$userexe = $conn->prepare($rsusers);
$userexe->bind_param('s',$_SESSION['user']);
$userexe ->execute();
$userexe ->store_result();
$userexe ->bind_result($uid, $username, $name, $surname, $level);
$userexe ->fetch();


function userclose() {
	$userexe ->close();
}


?> 