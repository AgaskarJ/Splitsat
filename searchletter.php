<?php
ob_start(); 
require_once('Connections/conndb.php');
require_once('Pages/letterclick.php');
error_reporting(0);
session_start();

//USERS
$rsusers = "SELECT Myuser, Name, Surname, Level FROM User WHERE Myuser = ?";
$userexe = $conn->prepare($rsusers);
$userexe->bind_param('s',$_SESSION['user']);
$userexe ->execute();
$userexe ->store_result();
$userexe ->bind_result($username, $name, $surname, $level);
$userexe ->fetch();

$xsearch = $_GET['search'];
//$xscelect = $_POST['selcategories'];
$rssearch="SELECT id, Word, Meaning, Type FROM Keywords WHERE LEFT(Word, 1) = ? ORDER BY Word ASC";
$allexe=$conn->prepare($rssearch);
$allexe->bind_param('s',$xsearch);
$allexe->execute();
$allexe->store_result();
$allexe->bind_result($id, $word, $meaning, $type);
$allexe ->fetch();


//$xscelect = $_POST['selcategories'];
$ssearching="SELECT id, Word FROM Keywords WHERE Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') And id = ? ORDER BY Word ASC";
$wordsexe=$conn->prepare($ssearching);
$wordsexe->bind_param('ss', $xsearch, $id);
$wordsexe->execute();
$wordsexe->store_result();
$wordsexe->bind_result($xid, $word);



  	$sensearch="SELECT senid, sentence FROM Sentences WHERE senid = ?";
	$senexe=$conn->prepare($sensearch);
	$senexe->bind_param('s',$id);
	$senexe->execute();
	$senexe->store_result();
	$senexe->bind_result($senid, $sentence);
	$senexe->fetch();
	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


	 <!-- Compiled and minified CSS -->
 	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  

  
  
		<head>
  
  

			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<link rel="shortcut icon" type="image/x-icon" href="Pictures/favicon.ico" />
			<title>Search by Letter</title>

			<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            
			<link href="Unreal css/css.css" rel="stylesheet" type="text/css">

		<style type="text/css">
body {
	background-color: #FFF;
}
		</style>
        
		</head>

		<body>

					 <!--Import jQuery before materialize.js-->
      			<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      			<script type="text/javascript" src="js/materialize.min.js"></script>

       
          <nav class="white lighten-4 z-depth-0" role="navigation">
          <div class="header">

               <div class="brand-logo center"><a href="index.php"><img src="Pictures/LOGO.png" width="70" height="70" align="center" /></a></div>
              <ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0 black-text">
      
                <?php $session = $_SESSION['user']; if ($session != NULL) { ?>
              <li><a class="black-text" href="Control/logged.php">+ Add more words</a></li>
              <?php } ?>
        
               <?php $session = $_SESSION['user']; if ($session == NULL) { ?>
              <li><a class="black-text" href="Control/index.php">Sign In</a></li>
              <li><a class="black-text" href="register.php">Create An Account</a></li>
              <?php } else { ?>
              <li><a class="black-text" href="Control/code/logout.php">Sign Out</a></li>
              <?php } ?>
               <li><a class="black-text" href="aboutus.php">About Us</a></li>
            </ul>
        </div>
      </nav>
  
<p></p>
<p></p>
<h6 align="center"><i><b>Search words by letter: </b></i></h6> <h5 align="center">| <?php clicka(); ?> | <?php clickb(); ?> | <?php clickc(); ?> | <?php clickd(); ?> | <?php clicke(); ?> | 
<?php clickf(); ?> | <?php clickg(); ?> | <?php clickh(); ?> | <?php clicki(); ?> | <?php clickj(); ?> | <?php clickk(); ?> | <?php clickl(); ?> | 
<?php clickm(); ?> | <?php clickn(); ?> | <?php clicko(); ?> | <?php clickp(); ?> | <?php clickq(); ?> | <?php clickr(); ?> | <?php clicks(); ?> | 
<?php clickt(); ?> | <?php clicku(); ?> | <?php clickv(); ?> | <?php clickw(); ?> | <?php clickx(); ?> | <?php clicky(); ?> | <?php clickz(); ?> |</h5>


 <div class="container">
          <table width="60%" border="0" cellpadding="0" cellspacing="0">
          <?php while ($allexe ->fetch()) { 
	//if ($cateexe ->num_rows>0) { ?>
           <tr title="<?php 
  	$sensearch="SELECT senid, sentence FROM Sentences WHERE senid = ?";
	$senexe=$conn->prepare($sensearch);
	$senexe->bind_param('s',$id);
	$senexe->execute();
	$senexe->store_result();
	$senexe->bind_result($senid, $sentence);
	$senexe->fetch();
	echo $sentence;
      ?>">
                 <td class="Word"><?php echo $word." "; ?><?php 
	             if ($type == 'Noun (n)') { 
	         echo "<img src=Pictures/noun.jpg height=20 width=20>"; 
	         } else if ($type == 'Verb (v)') {
	         echo "<img src=Pictures/verb.jpg height=20 width=20>"; 
	         } else if ($type == 'Adjective (ad)') {
	         echo "<img src=Pictures/adjective.jpg height=20 width=20>"; 
	         } else if ($type == 'Adverb (adv)') {
        	 echo "<img src=Pictures/adverb.jpg height=20 width=20>"; 
          	}
	         ?></td>
           </tr>

             <tr>
             <td><p class="Meaning"><?php echo $meaning; ?> - <a href="comments.php?wordid=<?php echo $id?>">Enter a comment <i class="font size: 5px material-icons ">chat</i></a></p>
             <p class="Meaning">&nbsp;</p>
                 
           </td>
        </tr>


            <?php  } ?>
            </table>
                </div>
<!--

<table width="60%" border="0" cellpadding="0" cellspacing="0">
  <?php while ($allexe ->fetch()) { 
	//if ($cateexe ->num_rows>0) { ?>
  <tr title="<?php echo $sentence ?>">
    <td><span class="Word">
	<?php 
	echo $word;
	/*
		$rssearch="SELECT id, Meaning, Word, Category, Type FROM Keywords WHERE Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') ORDER BY Word ASC";
		$trimexe=$conn->prepare($rssearch);
		$trimexe->bind_param('s',$word);
		$trimexe->execute();
		$trimexe->store_result();
		$trimexe->bind_result($trimid, $trimmeaning, $trimword, $trimcate, $trimtype);
		echo $trimword; */
	?>
      <?php 
	if ($type == 'Noun (n)') { 
	echo "<img src=Pictures/noun.jpg height=20 width=20>"; 
	} else if ($type == 'Verb (v)') {
	echo "<img src=Pictures/verb.jpg height=20 width=20>"; 
	} else if ($type == 'Adjective (ad)') {
	echo "<img src=Pictures/adjective.jpg height=20 width=20>"; 
	} else if ($type == 'Adverb (adv)') {
	echo "<img src=Pictures/adverb.jpg height=20 width=20>"; 
	}
	?>
    </span></td>
  </tr>
  <tr>
    <td><span class="Meaning"><?php echo $meaning; ?> - <a href="comments.php?wordid=<?php echo $id?>">Enter a comment</a></span></td>
  </tr>
  <?php  } ?>
</table> -->

 <footer class="page-footer white">
      
    <div class="footer-copyright green">
      <div class="container">
         <a class="white-text text-lighten-4 left" href="howto.php">How does Split Search work?</a>
         <a class="white-text text-lighten-2 right"> © Split Search by Jay. Version 1.2.3</a>
      </div>
    </div>
      </footer>

</body>
</html
<?php

$senexe->close();
$allexe ->close();
$userexe ->close();
$conn->close();

ob_flush();
?>