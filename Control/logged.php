<?php
ob_start(); 
error_reporting(-1);
require_once('../Connections/conndb.php');
session_start();
function checkfirst() {
  $den = "denied";
if ($_SESSION['user'] == NULL) {
  header ("location: index.php?login=$den");
}
}
checkfirst();

//CATEGORY
$rscategories = "SELECT id, Categories FROM Cate ORDER BY Categories ASC";
$cateexe = $conn->prepare($rscategories);
$cateexe ->execute();
$cateexe ->store_result();
$cateexe ->bind_result($cid, $rcategory);
//$cateexe ->fetch();

//TYPE
$rstype = "SELECT id, Type FROM Type ORDER BY Type ASC";
$typeexe = $conn->prepare($rstype);
$typeexe ->execute();
$typeexe ->store_result();
$typeexe ->bind_result($tid, $rtype);

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

 
      <form action="code/newwords.php" method="post" name="form1" id="form1">
  <label for="search"></label>
  <div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      
       
          <nav class="grey lighten-4 z-depth-0" role="navigation">
          <div class="header">

               <div class="brand-logo center"><a href="../index.php"><img src="../Pictures/LOGO.png" width="70" height="70" align="center" /></a></div>
              <ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0 black-text">
      
               <?php $session = $_SESSION['user']; if ($session == NULL) { ?>
              <?php } else { ?>
              <li><a class="black-text" href="code/logout.php">Sign Out</a></li>
              <?php } ?>
             <li><a class="black-text" href="../aboutusfinal.php">About Us</a></li>
            </ul>
        </div>
      </nav>
  
    </div></td>
  
  </div>
         </tr>
         </table>

         <p>
         </p> 
         <p></p> 

  <h6 align="center">Any words missing? Add them to the database!</h6>
<h6 align="center">Please make sure there are no duplicates before adding.</h6>


 <div class="row container">
             <form class="col s12">
               <div class="row">
                  <div class="input-field col s6">
                  Word
                     <input type="text" name="word" id="word" class="validate">
              
                   </div>
                     <div class="input-field col s6">
                      Meaning
                       <input type="text" name="meaning" id="meaning" class="validate">
                    
                   </div>
            <div class="row">
                   <div class="input-field col s12">
                    Sentence
                       <textarea name="sentence" id="sentence" class="materialize-textarea"></textarea>
                  
                   </div>
                </div>

                  Choose a Category and Type for your word. 

           <div class="row">
               <div class="input-field col s5">
                  <label for="Category"></label>
                   <select class="browser-default" name="category" id="category">
                  <?php while ($cateexe ->fetch()) {  ?>
                   <option name="selectcategory" id="selectcategory" value="<?php echo $rcategory;  ?>"><?php echo $rcategory;  ?></option>
                 <?php } ?>
                  </select>
              </div>
       
              <div class="input-field col s5">
                  <label for="Type"></label>
                   <select class="browser-default" name="type" id="type">
                  <?php while ($typeexe ->fetch()) {  ?>
                   <option name="selecttype" id="selecttype" value="<?php echo $rtype;  ?>"><?php echo $rtype;  ?></option>
                 <?php } ?>
                  </select>
            </div>

            Category Not Avaliable? Add a one! <a href="category.php">ADD CATEGORY</a>
       
     <p></p>
              <div class="row container">
              <button class="btn green white-text" type="submit" name="button" id="button" value="Submit">Submit</button>
                 <!-- <input type="submit" name="Submit" id="Submit" value="Submit" /> -->
  
              </div>
            </div>



<!-- 

    <label for="word"></label>
    <label for="meaning"></label>
  </p>
  <table width="100%" border="0">
    <tr>
      <td>Word</td>
      <td>Meaning</td>
      <td>Sentence</td>
    </tr>
    <tr>
      <td><textarea name="word" id="word" cols="45" rows="5"></textarea></td>
      <td><textarea name="meaning" id="meaning" cols="45" rows="5"></textarea></td>
      <td><textarea name="sentence" id="sentence" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><select name="category" id="category">
        <?php while ($cateexe ->fetch()) {  ?>
        <option name="selectcategory" id="selectcategory" value="<?php echo $rcategory;  ?>"><?php echo $rcategory;  ?></option>
        <?php } ?>
      </select></td>
      <td><select name="type" id="type">
        <?php while ($typeexe ->fetch()) { ?>
        <option name="selecttype" id="selecttype" value="<?php echo $rtype;  ?>"><?php echo $rtype;  ?></option>
        <?php } ?>
      </select></td>
      <td><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
  <p>
    <label for="sentence"><br />
      <br />
    </label>
    <label for="category"><br />
    </label>
  </p>
  <p>
    <label for="category"></label>
    <label for="type"></label>
  </p>
</form>
<p><a href="category.php">Category</a> ----- <a href="type.php">Type</a></p>

-->

 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../dist/js/materialize.js"></script>
  <script src="js/init.js"></script>
</body>
</html>
<?php   

$cateexe ->close();
$typeexe ->close();
$conn ->close();

ob_flush();
?>