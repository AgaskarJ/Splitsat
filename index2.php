<?php
ob_start(); 
require_once('Connections/conndb.php');
session_start();
error_reporting(0);

//USERS
$rsusers = "SELECT id, Myuser, Name, Surname, Level FROM User WHERE Myuser = ?";
$userexe = $conn->prepare($rsusers);
$userexe->bind_param('s',$_SESSION['user']);
$userexe ->execute();
$userexe ->store_result();
$userexe ->bind_result($uid, $username, $name, $surname, $level);
$userexe ->fetch();

$zero = 0;
$rsnotif = "SELECT nid, Notifwordid, Notifuserid, Notifread FROM Notifications WHERE Notifuserid = ? And Notifread = ?";
$notifexe=$conn->prepare($rsnotif);
$notifexe->bind_param('ss', $uid, $zero);
$notifexe ->execute();
$notifexe ->store_result();
$notifexe ->bind_result($nid, $notifword, $notifuser, $notifread);
$notifexe ->fetch();



?>




  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  

  <script src="js/reload.js"></script> 
 <!-- ________________________________________________________________________________ -->


  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Split SAT is a search engine designed for the old and redesigned SAT. Made for students by students.">
<meta name="keywords" content="Materialize, Splitsat, Splitsearch, Jay Agaskar, SAT, SAT search engine, Search engine, Split Sat, Split Search, PHP, HTML, SAT vocabulary, SAT words, ACT, Standardize American Test, Split Search, Split SAT, Vocabulary, Barrons, Essential 500, Princeton Review, Kaplan, College Board">
<meta name="author" content="Jay Agaskar">

    <link rel="shortcut icon" type="image/x-icon" href="Pictures/favicon.ico" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          
    <title>Split SAT</title>

<!-- __________________________________________________________________________________ -->


      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      


<!-- __________________________________________________________________________________ -->
   
      
<link href="Unreal css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">


.Bar {
  font-family: "Gill Sans Light";
  font-size: 32px;
  font-style: normal;
  line-height: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  color: #000;
}
.txt {
  font-family: "Helvetica Neue";
  font-size: 14px;
  color: #000;
}
.box {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  font-weight: normal;
}
.buttonsearch {
  background-image: url(Pictures/search.png);
  border-top-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
  border-left-style: none;
  background-repeat: no-repeat;
  height: 40px;
  width: 39px;
  background-color: #FFF;
  border-top-width: 1px;
  border-right-width: 1px;
  border-bottom-width: 1px;
  border-top-color: #CCC;
  border-right-color: #CCC;
  border-bottom-color: #CCC;
  background-position: center center;
}
</style>

 <!-- ________________________________________________________________________________ -->
 
 <script> 
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
          
 </script> 
</head>

<body onLoad="set_interval();set_interval2();">

        <!--Import jQuery before materialize.js-->
              <!-- START JQUERY -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


 <!-- ________________________________________________________________________________ -->
  
<?php
function oxne() {
  global $uid;
$zero1 = 0;
$rsnotif2 = "SELECT nid, Notifwordid, Notifuserid, Notifread FROM Notifications WHERE Notifuserid = ? And Notifread = ?";
$testexe=$conn->prepare($rsnotif2);
$testexe->bind_param('ss', $uid, $zero1);
$testexe ->execute();
$testexe ->store_result();
$testexe ->bind_result($nid2, $notifword2, $notifuser2, $notifread2);
$testexe ->fetch(); 
$testxx = $testexe->num_rows;
global $textxx;
}

?>


  <script> toastit(); </script> 
  <script> 
      function toastit()
 {
         Materialize.toast('Welcome Back!', 4000);
 }
 </script>

 <script>

   function toastit2()
 {
         Materialize.toast('You have <?php echo $testxx; ?> notifications', 5000);
 }

</script> 

<script> 
function numb() 
{
    document.getElementById("demo").innerHTML = Math.random();
}
</script> 

 <?php 
    $session = $_SESSION['user']; 
    if ($session != NULL) {
      echo "<script> toastit(); </script>"; 
        echo "<script> toastit2(); </script>"; 
    }
?>  




<nav class="white lighten-4 z-depth-0" role="navigation">
          <div class="header">
              <ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0 black-text">
      
            <?php $session = $_SESSION['user']; if ($session != NULL) { ?>
           <!-- <li><a href="">sass <span class="new badge">
           <?php echo $notifexe -> num_rows; ?></span></a></li> -->
           <div id="demo">J</div> 
<?php echo $testxx; ?>
                <li><?php echo "Hi, ".$username; ?></li>
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


      <form name="form1" method="post" action="search.php">
          <label for="search"></label>
            <div align="center">
  
            
            
          <div class="container">
             <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
           <div class="container">
                 <td width="60%"><div align="center" class="body"><img src="Pictures/LOGO.jpg" width="200" height="200" align="middle"></div>
                   <p>&nbsp;</p>
        


         <nav>
             <div class="nav-wrapper #f5f5f5 grey lighten-4">
               <form>
               <div class="input-field z-depth-0">
                 <input id="search" type="search" name="search" required>
                 <label for="search"><i class="material-icons grey-text">search</i></label>
             </div>
          </form>
       </div>
    </nav>


     
               </td>
                 <td width="1%">&nbsp;</td>
             </tr>
               </table>
      <p><a href="advancedsearch.php"><div align="center">Advanced Search</a> | <a href="searchletter.php">Search By Letter</div></a></div></p>
           <p>
          <label for="selcategories"></label>
          </p>

        </form>

          </div>

                    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </div>


                <!-- VERSIONS : 
      <p align="left" class="Text">SPLIT By Jay <?php 

          $fp =  fopen("Version.txt","r"); 
          $data = ""; 
                
          while (!feof($fp)) {
          $data .= fgets($fp,4096); 
                    }
          echo $data;
          ?></p> -->
                                
                                
                 <!-- FOOTER START -->                       
        <footer class="page-footer white footer">
            
               <div class="footer-copyright">
                   <div class="black-text container">


           <a class="black-text nav-wrapper text-lighten-4 left" href="howto.php">How does Split Search work?</a>
     


            </div>
                <div class="black-text container">
             <a class="black-text text-lighten-2 right"> © Split Search by Jay. Version 1.2.3</a>
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
          </script>

          <div class="statcounter">
                    <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=10689406; 
var sc_invisible=0; 
var sc_security="d7ecbbbd"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="shopify
analytics" href="http://statcounter.com/shopify/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/10689406/0/d7ecbbbd/0/"
alt="shopify analytics"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
       </div>
                                
    </body>
  </html>

<?php 
$notifexe -> close();
$userexe -> close();
$conn -> close();
ob_flush();
?>
