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

<title>About Us</title>

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
            </ul>
        </div>
      </nav>
  
    </div></td>
  
  </div>
         </tr>
         </table>




  <div class="container">
    <div class="section">



        <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3 class="center green-text"><i class=" large material-icons">info_outline</i></h3>
          <h4>A little about Split Search</h4>
          <p class="left-align light">Split Search is a search-engine on SAT vocabluary. Students can quickly search for SAT words depending on their meanings, types (nouns, verbs, etc) or category (action words, optimistic words, words relating to time, etc) 

Members have the option of adding more of their own SAT vocabulary to the database; to benefit others in the community also looking for that particular word. Members can also add comments and engage in discussions on the comments page for the particular word. Split Search aims to achieve an active community of people who are working towards gaining the best scores on the grammar section of the SAT.
</p>
        </div>
      </div>

    </div>
  </div>




      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center green-text"><i class=" large material-icons">search</i></h2>
            <h5 class="center">Quick Searches</h5>

            <p class="light">Split Search ignores all the background information shown on websites such as Google and only focuses on the particular word and other options.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center green-text"><i class="large material-icons">subject</i></h2>
            <h5 class="center">An Organized Interface</h5>

            <p class="light">Split Search uses a clean web interface and is user friendly. It is integrated with a simple design that is easy to navigate through for everyone.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center green-text"><i class="large material-icons">chat_bubble_outline</i></h2>
            <h5 class="center">Chat With Other Users</h5>

            <p class="light">Split Search is incorporated with an interactive comment system for users with similar SAT quesitons to ask other users. Members can add their own words to the database, that, in the long term can grow into a large datbase of vocabulary.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  
      <div class="row">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="Pictures/profile.JPG">
              <span class="card-title">Jay Agaskar</span>
            </div>
            <div class="card-content">
              <p>Creator of Split Search. Have been programming for 4 years. Student of Computer Science at IGCSE and IB HL. Project launched on December 13th 2014.</p>
            </div>
          </div>
        </div>
        <div class="col s12 m8">
          <h5 class="green-text">See the full development of Split Search from the start:</h5>
               <iframe width="560" height="315" src="https://www.youtube.com/embed/MQdhjZX3Tfs" frameborder="0" allowfullscreen></iframe> 
        </div>
      </div>

<div class="container">
   <h5 class="green-text">Version 1.1</h5>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/tYNfkP0XaxE" frameborder="0" allowfullscreen></iframe>
</div>

<div class="container">
   <h5 class="green-text">Version 1.2</h5>
<iframe width="560" height="315" src="https://www.youtube.com/embed/V2ixp926dt0" frameborder="0" allowfullscreen></iframe>
</div>

<div class="container">
   <h5 class="green-text">Version 1.2.1</h5>
<iframe width="560" height="315" src="https://www.youtube.com/embed/sFhQXNRmiVU" frameborder="0" allowfullscreen></iframe>
 </div>    




  <footer class="page-footer white">
      
    <div class="footer-copyright green">
      <div class="container">
         <a class="white-text text-lighten-4 left" href="howto.php">How does Split Search work?</a>
         <a class="white-text text-lighten-2 right"> © Split Search by Jay. Version 1.2.1</a>
      </div>
    </div>  
  </footer>


</form>
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