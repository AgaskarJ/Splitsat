<?php
ob_start(); 
require_once('../Connections/conndb.php');
session_start();
function checkfirst() {
	$den = "denied";
if ($_SESSION['user'] == NULL) {
	header ("location: index.php?login=$den");
}
}
checkfirst();

ob_flush();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>


<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="shortcut icon" type="image/x-icon" href="../Pictures/favicon.ico" />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<title>Add Words</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<link href="Unreal css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">

.txt {
  font-family: Verdana, Geneva, sans-serif;
  font-size: 14px;
  color: #000;
}
.Text { font-family: "Champagne & Limousines Bold";
  font-size: 17px;
  font-style: italic;
  line-height: normal;
  font-weight: normal;
  font-variant: normal;
  color: #CCC;
}
</style>
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
</head>

<body>

   <!--Import jQuery before materialize.js-->
              <!-- START JQUERY -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<p></p>
<p></p>
<p></p>
	<div class="container">
<form id="form1" name="form1" method="post" action="code/newcategory.php">

  <label for="categorytxt"></label>
  <input type="text" name="categorytxt" id="categorytxt" class="validate">
  <button class="btn green white-text" type="submit" name="buttonc" id="buttonc" value="Submit">Submit</button>

</form>

<p><a href="logged.php">Back to Adding Words</a></p>
  </div>

</body>
</html>