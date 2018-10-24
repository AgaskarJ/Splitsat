<?php 
ob_start(); 
require_once('Connections/conndb.php');

session_start();


//USERS
$rsusers = "SELECT id, Myuser, Name, Surname, Level FROM User WHERE Myuser = ?";
$userexe = $conn->prepare($rsusers);
$userexe->bind_param('s',$_SESSION['user']);
$userexe ->execute();
$userexe ->store_result();
$userexe ->bind_result($uid, $username, $name, $surname, $level);
$userexe ->fetch();

$xid = $_GET['wordid'];
//$xscelect = $_POST['selcategories'];
$rssearch="SELECT id, Meaning, Word, Category, Type FROM Keywords WHERE id = ?";
$allexe=$conn->prepare($rssearch);
$allexe->bind_param('s',$xid);
$allexe->execute();
$allexe->store_result();
$allexe->bind_result($wid, $meaning, $word, $cate, $type);
$allexe->fetch();

//$xid = $_GET['wordid'];
$xrssearch="SELECT Comments.id, userid, comments, wordid, User.id, Name, Surname FROM Comments, User WHERE wordid = ? AND userid = User.id";
$commexe=$conn->prepare($xrssearch);
$commexe->bind_param('s',$xid);
$commexe->execute();
$commexe->store_result();
$commexe->bind_result($cid, $userid, $comments, $wordid, $theuserid, $nameuser, $surnameuser);

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
  <link rel="shortcut icon" type="image/x-icon" href="Pictures/favicon.ico" />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title><?php echo "Comments - ".$_POST['search'];?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<link href="Unreal css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<script>

   $(function() {
    $( document ).tooltip();
  });
  </script>

.txt {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #000;
}
.Text {	font-family: "Champagne & Limousines Bold";
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
      
      
<form action="search.php" method="post" name="form1" id="form1">
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
               <li><a class="black-text" href="aboutusfinal.php">About Us</a></li>
   
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


<div class="container">
<p>&nbsp;</p>
<p><span class="txt">Discussion for:</span> <?php echo $word; ?></p>
 <?php $session = $_SESSION['user']; if ($session != NULL) { ?>
<form id="form2" name="form2" method="post" action="Control/code/newcomment.php">
  <p class="txt">Comments: </p>
  <p>


  <div class="row">
      <div class="input-field col s12">
       <textarea name="entercomment" id="entercomment" class="materialize-textarea" length="100"></textarea>
      </div>
    </div>



  <!-- <label for="textfield"></label>
    <label for="entercomment"></label>
    <textarea name="entercomment" id="entercomment" cols="45" rows="5"></textarea> --> 

      <div class="row container">
       <button class="btn white black-text" type="submit" name="newcomment" id="newcomment" value="Submit">Submit</button>
         <!-- <input type="submit" name="Submit" id="Submit" value="Submit" /> -->
     </div>
    </div>



    <!-- <input type="submit" name="newcomment" id="newcomment" value="Submit" /> -->
    <input name="userid" type="hidden" id="userid" value="<?php echo $uid; ?>" />
    <input name="wordid" type="hidden" id="wordid" value="<?php echo $wid; ?>" />
  <?php echo $uid; ?><?php echo $wid; ?></p>


  
</form>
<?php } else {  echo "Please login first to leave a comment!"; } ?>

<div class="container">
<p>
<?php
while ($commexe->fetch()) { 
echo "<br>".$nameuser.$surnameuser." : ".$comments."</br>";
}
?>
</p>






</div>
</div>

<p>&nbsp;</p>

         <!-- FOOTER START                      
        <footer class="page-footer white footer">
    
             <div class="container">
                  <div class="row">
            </div>
           </div>
               <div class="footer-copyright">
                   <div class="black-text container">
           <a class="black-text nav-wrapper text-lighten-4 left" href="howto.php">How does Split Search work?</a>
        
            </div>
                <div class="black-text container">
             <a class="black-text text-lighten-2 right"> © Split Search by Jay. Version 1.2.1</a>
            </div>
           </div>
         </div>
    </footer>

      <script language="javascript">
             function autoResizeDiv()
             {
                  document.getElementById('main').style.height = window.innerHeight +'px';
             }
             window.onresize = autoResizeDiv;
             autoResizeDiv();
          </script> -->

<!-- 
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><span class="Text">SPLIT By Jay
    <?php 



								$fp =  fopen("Version.txt","r"); 
								$data = ""; 
								
								while (!feof($fp)) {
									$data .= fgets($fp,4096); 
								}
								echo $data;
								?>
</span><br />
</p> --> 
</body>
</html>

<?php 

$allexe ->close();
$commexe ->close();
$conn ->close();
$userexe->close();
ob_flush();
?>