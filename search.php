<?php
ob_start(); 
session_start();
require_once('Connections/conndb.php');
require_once('rs/user_rs.php');
require_once('rs/search_rs.php');
require_once('rs/navbar.php');

?>

<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

  <!-- ________________________________________________________________________________  -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="shortcut icon" type="image/x-icon" href="Pictures/favicon.ico" />

       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo "SplitSearch - ".$_POST['search'];?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<link href="Unreal css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">

$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });

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
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>



      <form name="form1" method="post" action="search.php">
          <label for="search"></label>
            <div align="center">
           <table width="100%" border="0"> 
              <tr>
      
       
          <nav class="white lighten-4 z-depth-0" role="navigation">
          <div class="header">
              <ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0 black-text">
      
             <?php navindex(); ?> 
   
            </ul>
        </div>
      </nav>
  
    </div></td>
  
  </div>

 <!-- ________________________________________________________________________________ -->

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
          <span class="txt">Your Search has returned:</span> <?php echo $allexe -> num_rows; ?> <span class="txt">Result(s)</span><br>
          <br>

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
                      <p>

                         <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="large material-icons">swap_vert</i>Sentences</div>
      <div class="collapsible-body"><p>   <?php echo $sentence; ?></p></div>
    </li>
   
  </ul>

                    </li>
                </ul>
              </p>
           </td>
        </tr>


            <?php  } ?>
            </table>
                </div>


  <footer class="page-footer white">
      
    <div class="footer-copyright green">
      <div class="container">
         <a class="white-text text-lighten-4 left" href="howto.php">How does Split Search work?</a>
         <a class="white-text text-lighten-2 right"> © Split Search by Jay. Version 1.2.2</a>
      </div>
    </div>
      </footer>

</body>
</html>

<?php   


$senexe->close();
searchclose();
usersclose();
$conn ->close();

ob_flush();
?>