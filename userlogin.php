<?php
ob_start(); 
error_reporting(-1);
require_once('Connections/conndb.php');
session_start();
function checkfirst() {
	$den = "denied";
if ($_SESSION['user'] == NULL) {
	header ("location: index.php?login=$den");
}
}
checkfirst();

//Username
$rsname = "SELECT Name, Surname, Username FROM User ";
$nameexe = $conn->prepare($rscategories);
$nameexe ->execute();
$nameexe ->store_result();
$nameexe ->bind_result($cid, $rcategory);
//$cateexe ->fetch();


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Home</title>
</head>

<body>
<p><a href="code/logout.php">Logout </a>Welcome : </p>
<p>&nbsp;</p>
</body>
</html>
<?php   

$nameexe ->close();
$conn ->close();


ob_flush();
?>