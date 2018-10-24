


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


	 <!-- Compiled and minified CSS -->
 	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  

  
  
		<head>
  
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<link rel="shortcut icon" type="image/x-icon" href="Pictures/favicon.ico" />
			<title>Create Account</title>

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

					<form id="form1" name="form1" method="post" action="Control/code/newusers.php">


<nav class="grey lighten-4 z-depth-0" role="navigation">
          <div class="header">

               <div class="brand-logo center"><a href="index.php"><img src="Pictures/LOGO.png" width="70" height="70" align="center" /></a></div>
              <ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0 black-text">
      
                <?php $session = $_SESSION['user']; if ($session == NULL) { ?>
               <li><a class="black-text" href="Control/index.php">Sign In</a></li>
               <?php } ?>
                <li><a class="black-text" href="aboutus.php">About Us</a></li>
            </ul>
        </div>
      </nav>



  							<h2 align="center">Create your Split Search account</h2>
 
 							 <h6 align="center">Please provide us with some general information about yourself:</h6>
 						
               <h6 align="center">Not sure of the benefits? Read more about what you can do by registering for an acocunt <a href="howto.php">here.</a></h6>
               <h6 align="center">All fields are required to be filled in.</h6>

 				 <div class="row container">
   					 <form class="col s12">
   					   <div class="row">
    					    <div class="input-field col s6">
     						     <input type="text" name="name" id="name" class="validate">
     						      <label for="name">First Name*</label>
       						 </div>
       							 <div class="input-field col s6">
       							   <input type="text" name="surname" id="surname" class="validate">
       							    <label for="surname">Last Name*</label>
       						 </div>
      					</div>
     			 <div class="row">
       				 <div class="input-field col s6">
        				  <input type="text" name="emailtxt" id="emailtxt" class="validate">
         				  <label for="emailtxt">Email*</label>
         		 <!-- <label for="emailtxt" data-error="wrong" data-success="right"></label> -->
       					 </div>
       
       			 <div class="input-field col s2">
       					 <input class="with-gap" type="radio" name="radio" id="male" value="male" />
     					 <label for="male">Male*</label>
      					</div>
     			 <div class="input-field col s2">
     					 <input class="with-gap" type="radio" name="radio" id="female" value="female" />
     					 <label for="female">Female*</label>
     					 </div>
   					 </div>
     
    								 Why would you like to join Split Search? * 
     
    				 <div class="row">
      					 <div class="input-field col s12">
         					 <textarea name="jointxt" id="jointxt" class="materialize-textarea" length="100"></textarea>
         					 <label for="jointxt">A few words on how you would be essential to the SAT community.</label>
       					 </div>
     				 </div>
      
       				<div class="row container">
  						<button class="btn green white-text" type="submit" name="Submit" id="Submit" value="Submit">Next Step</button>
 								 <!-- <input type="submit" name="Submit" id="Submit" value="Submit" /> -->
  
  						</div>
  				  </div>

 				 <!-- 
				  <p align="center" class="subtxt">Please provide us with some general information about yourself:</p>
 				 <p align="center" class="subtxt">All fields are required to be filled in</p>
 				 <p align="center"><span class="txt">First Name:</span>
 					 <input type="text" name="name" id="name" />
				</p>
				  <p align="center"><span class="txt">Surname: </span>
 				   <input type="text" name="surname" id="surname" />
 				 </p>
 				 <p align="center"><span class="txt">Gender:</span>
  				  <input type="radio" name="radio" id="male" value="male" />
  				  <span class="txt">
  				Male</span>
  				  <input type="radio" name="radio" id="female" value="female" />
 				 <span class="txt">  Female</span></p>
 				 <p align="center"><span class="txt">Email Address:</span>
 				   <input type="text" name="emailtxt" id="emailtxt" />
 				 </p>
 				 <p align="center" class="txt">Why would you like to join SplitSearch?</p>
  				<p align="center" class="subtxt">A few short sentences why you would be essensial to the SAT community.</p>
				  <p align="center">
 				 <label for="jointxt"></label>
 				 <label for="jointxt"></label>
 				 <label for="jointxt"></label>
 				 <textarea name="jointxt" id="jointxt" cols="45" rows="5"></textarea>
 				 </p>
 				 <p align="center" class="subtxt">Are you familliar with the rules and how the site works? </p>
 				 <p align="center">
 				   <input type="submit" name="Submit" id="Submit" value="Submit" />
 					 </p>
 				 <p align="center"><span class="subtxt">Click here to find out more: </span><a href="howto.php">How Do We SplitSearch?</a></p>
 				 <p>&nbsp;</p>
  
 				 -->
  
  			</form>
		</form>

		</body>
	</html>

