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

<title>How To - Split Search</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<link href="Unreal css/css.css" rel="stylesheet" type="text/css">


</head>

<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      
       
          <nav class="white lighten-4 z-depth-0" role="navigation">
          <div class="header">

               <div class="brand-logo center"><a href="index.php"><img src="Pictures/LOGO.png" width="70" height="70" align="center" /></a></div>
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

<div class="container center" align="center">
      <h2 class="green-text">How do we Split Search?</h2>

      <p></p>
      <h8>With a massive amount of words in Split Search's database, how do we use it effectively?</h8>
      <p></p>
      <h8>It's easy: When your term has been searched, results will be displayed in this format -</h8>
		<p></p>

      <a><img src="Pictures/howtoex.jpg"></a>
		
		     <p></p>
		      </div>

<div class="container green">
    <ul class="collection z-depth-1">
      <li class="collection-item left green white-text"><b>1.</b> The search begins with the word. Clear and powerful. </li>
      <li class="collection-item left"><b>2.</b> Words are followed closely by their type. These include small icons that indicate if it is a Noun, Adverb, Adjective, Verb or Pronoun.</li>
      <li class="collection-item left green white-text"><b>3.</b> Under the word is it's definition. Emphasized in <i>italics.</i></li>
      <li class="collection-item left"><b>4.</b>Beside the definition stands a button with the option to add a comment to this particular word. Adding a comment allows you to ask questions or answer questions from other users about the word in context.</li>
      <li class="collection-item left green white-text"><b>5.</b> Finally, Split Search is topped with an expanding section to display sentences; showing users how the particular word has been used.</li>
    </ul>
</div>

  <p class="texting">&nbsp;</p>

<div class="container">
<h8>Word type symbols: </h8>
<p></p>
      <div class="row">
      <div class="col s1"><a><img src="Pictures/noun.jpg"></a></div>
      <div class="col s1"><a><img src="Pictures/adjective.jpg"></a></div>
      <div class="col s1"><a><img src="Pictures/adverb.jpg"></a></div>
      <div class="col s1"><a><img src="Pictures/verb.jpg"></a></div>
      <div class="col s1"><a><img src="Pictures/pronoun.jpg"></a></div>
    </div>
</div>

  <p class="texting">&nbsp;</p>

<div class="container">
<h5>What does creating an account do?</h5>
</div>
<div class="container">
<p></p>
 <ul class="collection z-depth-1">
      <li class="collection-item left green white-text"><b>1.</b> Being a valued member allows users from the same SAT community; users who require help just like ourselves on the grammar section to connect and learn words. This is achieved by Split Search because it provides users with simplified word definitions and ignores all the uneccesary background information that would be destracting. The entirety of Split Search wil be in full focus onto words. </li>
      <li class="collection-item left"><b>2.</b> Users interact by discussing and asking questions on particular words in the comment system. Not sure if the word is correctly placed in a sentence? Answers are provided by students to students.</li>
      <li class="collection-item left green white-text"><b>3.</b> Users have the option to <i>Add their own words</i> to the Split Search database! If it is lacking the vocab, users can choose to add it, helping many others in return to create a database of words that is growing everyday.</li>
      <li class="collection-item left"><b>4.</b>Are you convinced? <a href="register.php">Join here</a> or in the Create An Account page of the site.</li>
    </ul>
</div>


     <footer class="page-footer white">
    <div class="footer-copyright green">
      <div class="container">
         <a class="white-text text-lighten-2 right"> © Split Search by Jay. Version 1.2.2</a>
      </div>
    </div>  
  </footer>



  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../dist/js/materialize.js"></script>
  <script src="js/init.js"></script>

      
 



</body>
</html>

<?php 

$allexe ->close();
$commexe ->close();
$conn ->close();
$userexe->close();
ob_flush();
?>