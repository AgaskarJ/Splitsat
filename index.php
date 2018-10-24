<?php
ob_start(); 
session_start();
require_once('Connections/conndb.php');
require_once('rs/user_rs.php');
require_once('rs/notif_rs.php');
require_once('rs/navbar.php');
require_once('rs/version.php');
error_reporting(0);

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
        // Materialize.toast('You have <?php echo $testxx; ?> notifications', 5000);
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
      
           <?php navindex(); ?>
   
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
                         
                 <!-- FOOTER START -->                       
        <footer class="page-footer white footer">
            
               <div class="footer-copyright">
                   <div class="black-text container">


           <a class="black-text nav-wrapper text-lighten-4 left" href="howto.php">How does Split Search work?</a>
     


            </div>
                <div class="black-text container">
             <a class="black-text text-lighten-2 right"> © Split Search by Jay. <?php versiontxt(); ?></a>
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
notifclose();
usersclose();
$conn -> close();
ob_flush();
?>
