<?php 


function navindex() {
	global $username;
	 $session = $_SESSION['user']; 

	 if ($session != NULL) {
     echo "<li> Hi, ".$username;"</li>";
     echo "<li><a class=black-text href=Control/logged.php>+ Add more words</a></li>";
     } 
        
      $session = $_SESSION['user']; 

      if ($session == NULL) {
          echo "<li><a class=black-text href=Control/index.php>Sign In</a></li>";
          echo "<li><a class=black-text href=register.php>Create An Account</a></li>";
      } else {
           echo "<li><a class=black-text href=Control/code/logout.php>Sign Out</a></li>";
      }
           echo "<li><a class=black-text href=aboutusfinal.php>About Us</a></li>";
}


?> 