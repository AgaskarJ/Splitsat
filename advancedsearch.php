<?php
ob_start(); 
error_reporting(0);
require_once('Connections/conndb.php');

session_start();

$select1 = $_POST['select1'];
$select2 = $_POST['select2'];
$select3 = $_POST['select3'];
$select4 = $_POST['select4'];
$search = $_POST['search'];



//USERS
$rsusers = "SELECT Myuser, Name, Surname, Level FROM User WHERE Myuser = ?";
$userexe = $conn->prepare($rsusers);
$userexe->bind_param('s',$_SESSION['user']);
$userexe ->execute();
$userexe ->store_result();
$userexe ->bind_result($username, $name, $surname, $level);
$userexe ->fetch();

/*if ($select1 == "Meaning" OR $select2 == "Meaning" OR $select3 == "Meaning" OR $select4 == "Meaning") {
	$me = "Meaning COLLATE utf8_unicode_ci LIKE CONCAT('%',?,'%')";
}

if ($select1 == "Type" OR $select2 == "Type" OR $select3 == "Type" OR $select4 == "Type") {
	$ty = "Type COLLATE utf8_unicode_ci LIKE CONCAT('%',?,'%')";
}

if ($select1 == "Category" OR $select2 == "Category" OR $select3 == "Category" OR $select4 == "Category") {
	$ca = "Category COLLATE utf8_unicode_ci LIKE CONCAT('%',?,'%')";
}

if ($select1 == "Word" OR $select2 == "Word" OR $select3 == "Word" OR $select4 == "Word") {
	$wo = "Word COLLATE utf8_unicode_ci LIKE CONCAT('%',?,'%')";
}

echo $me.$ty.$ca.$wo;*/


$xsearch = $_POST['search'];
//$xscelect = $_POST['selcategories'];
$rssearch="SELECT id, Meaning, Word, Category, Type FROM Keywords WHERE Category COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Category COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Category COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Category COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Category COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Type COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Type COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Type COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Type COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Type COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Meaning COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Meaning COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR  Meaning COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR  Meaning COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR  Meaning COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR  Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR  Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR  Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') And Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') ORDER BY Word ASC";
$allexe=$conn->prepare($rssearch);
$allexe->bind_param('sssssssssssssssssssss',$search, $select1, $select2, $select3, $select4, $search, $select1, $select2, $select3, $select4, $search, $select1, $select2, $select3, $select4, $search, $select1, $select2, $select3, $select4, $xsearch);
$allexe->execute();
$allexe->store_result();
$allexe->bind_result($id, $meaning, $word, $cate, $type);

?>


<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>


<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="shortcut icon" type="image/x-icon" href="Pictures/favicon.ico" />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title><?php echo "SplitSearch - ".$_POST['search'];?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<link href="Unreal css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<script>

   $(function() {
    $( document ).tooltip();
  });
  </script>
  <style>
  label {
    display: inline-block;
    width: 5em;
  }
 
.Word {
  font-family: Verdana, Geneva, sans-serif;
  font-size: 26px;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  color: #000;
}
.Meaning {
  font-family: Verdana, Geneva, sans-serif;
  font-size: 14px;
  font-style: italic;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  color: #000;
}
.txt {
  font-family: Verdana, Geneva, sans-serif;
  font-size: 14px;
  color: #000;
}
</style>
</head>

<body>



   <!--Import jQuery before materialize.js-->
              <!-- START JQUERY -->
              <!--
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


<form action="" method="post" name="form1" id="form1">
  <label for="search"></label>
  <div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>


          <nav class="white lighten-4 z-depth-0" role="navigation">
          <div class="header">
              <ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0 black-text">
      
                <?php $session = $_SESSION['user']; if ($session != NULL) { ?>
                <li><?php echo "Hi! ".$username; ?></li>
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

 <td width="10%"><a href="index.php"><img src="Pictures/LOGO.jpg" width="110" height="110" /></a></td>
        <td width="90%"><p>
          
          <div class="container left">
         <nav>
             <div class="nav-wrapper #f5f5f5 grey lighten-4">
               <form>
               <div class="input-field z-depth-0">
                 <input id="search" type="search" name="search" required>
                 <label for="search"><i class="material-icons grey-text">search</i></label>
                  <span class="black-text">Not getting your results? Try:  <a class="blue-text" href="advancedsearch.php">Advanced Search</a></span> </p>
             </div>
          </form>
       </div>
    </nav>
  </div>
  
         
          
        </p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
            </form>
          
          <span class="txt" align="center">Your Search has returned:</span> <?php echo $allexe -> num_rows; ?> <span class="txt">Result(s)</span><br>
          <br>
-->




<!-- ___________________________________________________________________________ -->

     <!--Import jQuery before materialize.js-->
              <!-- START JQUERY -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


    <form action="" method="post" name="form1" id="form1">
  <label for="search"></label>
  <div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
      
       
          <nav class="white lighten-4 z-depth-0" role="navigation">
          <div class="header">
              <ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0 black-text">
      
                <?php $session = $_SESSION['user']; if ($session != NULL) { ?>
                <li><?php echo "Hi! ".$username; ?></li>
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
  
    </div></td>
  
  </div>
         </tr>
         </table>



<form action="" method="post" name="form1" id="form1">
  <label for="search"></label>
  <div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10%"><a href="index.php"><img src="Pictures/LOGO.jpg" width="110" height="110" /></a></td>
        <td width="90%"><p>
          
          <div class="container left">
         <nav>
             <div class="nav-wrapper #f5f5f5 grey lighten-4">
               <form>
               <div class="input-field z-depth-0 black-text">
                 <input id="search" type="search" name="search" required>
                 <label for="search"><i class="material-icons grey-text">search</i></label>
                  <span class="black-text">Go back to <a class="blue-text" href="advancedsearch.php">Original Search</a></span> </p>
             </div>
          </form>
       </div>
    </nav>
  </div>
  
         
          
        </p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
            </form>

          <span class="txt">Your Search has returned:</span> <?php echo $allexe -> num_rows; ?> <span class="txt">Result(s)</span><br>
          <br>



       <div class="container"> 
          <p>Search by:

      <div class="input-field col s6">
    <label for="select1"></label>
    <select class="browser-default" name="select1" id="select1">
      <option>Please Select</option>
      <option value="Category">Category</option>
      <option value="Type">Type</option>
      <option value="Meaning">Meaning</option>
      <option value="Word">Word</option>
    </select>

    <label for="selecttype"></label>
    <select class="browser-default" name="select2" id="select2">
      <option>Please Select</option>
      <option value="Category">Category</option>
      <option value="Type">Type</option>
      <option value="Meaning">Meaning</option>
      <option value="Word">Word</option>
    </select>

    <label for="select3"></label>
    <select class="browser-default" name="select3" id="select3">
      <option>Please Select</option>
      <option value="Category">Category</option>
      <option value="Type">Type</option>
      <option value="Meaning">Meaning</option>
      <option value="Word">Word</option>
    </select>

    <label for="select4"></label>
    <select class="browser-default" name="select4" id="select4">
      <option>Please Select</option>
      <option value="Category">Category</option>
      <option value="Type">Type</option>
      <option value="Meaning">Meaning</option>
      <option value="Word">Word</option>
    </select>
  </div>



<!--
           <label for="select1"></label>
            <select name="select1" id="select1">
              <option>Please Select</option>
              <option value="Category">Category</option>
              <option value="Type">Type</option>
              <option value="Meaning">Meaning</option>
              <option value="Word">Word</option>
            </select> 
            <label for="selecttype"></label>
            <select name="select2" id="select2">
              <option>Please Select</option>
              <option value="Category">Category</option>
              <option value="Type">Type</option>
              <option value="Meaning">Meaning</option>
              <option value="Word">Word</option>
            </select> 
            <select name="select3" id="select3">
              <option>Please Select</option>
              <option value="Category">Category</option>
              <option value="Type">Type</option>
              <option value="Meaning">Meaning</option>
              <option value="Word">Word</option>
            </select>
            <select name="select4" id="select4">
              <option>Please Select</option>
              <option value="Category">Category</option>
              <option value="Type">Type</option>
              <option value="Meaning">Meaning</option>
              <option value="Word">Word</option>
            </select> -->


          </p>
        </div>
         
        </p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</form>


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
             <td><p class="Meaning"><?php echo $meaning; ?> - <a href="comments.php?wordid=<?php echo $id?>">Enter a comment</a></p>
             <p class="Meaning">&nbsp;</p></td>
            </tr>
            <?php  } ?>
            </table>
                </div>

                <!-- 

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
    <td><span class="Word"><?php echo $word; ?><?php 
	if ($type == 'Noun (n)') { 
	echo "<img src=Pictures/noun.jpg height=20 width=20>"; 
	} else if ($type == 'Verb (v)') {
	echo "<img src=Pictures/verb.jpg height=20 width=20>"; 
	} else if ($type == 'Adjective (ad)') {
	echo "<img src=Pictures/adjective.jpg height=20 width=20>"; 
	} else if ($type == 'Adverb (adv)') {
	echo "<img src=Pictures/adverb.jpg height=20 width=20>"; 
	}
	?></span></td>
  </tr>
  <tr>
    <td><span class="Meaning"><?php echo $meaning; ?> - <a href="comments.php?wordid=<?php echo $id?>">Enter a Comment</a></span></td>
  </tr>
  <?php  } ?>
</table>
</div>  -->

</body>
</html>

<?php   

$senexe->close();
$allexe ->close();
$userexe ->close();
$conn ->close();

ob_flush();
?>

