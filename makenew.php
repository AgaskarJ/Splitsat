



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
      
      
						</head>


						<body>

 									<!--Import jQuery before materialize.js-->
    							  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     							 <script type="text/javascript" src="js/materialize.min.js"></script>
      
      
								<form id="form1" name="form1" method="post" action="update.php">

        			<nav class="grey lighten-4 z-depth-0" role="navigation">
 						<div class="brand-logo center"><a href="index.php"><img src="Pictures/LOGO.png" width="70" height="70" align="center" /></a></div>
 							<div class="nav-wrapper z-depth-0">
  								<ul id="nav-mobile" class="right hide-on-med-and-down z-depth-0">
    								<li><a class="black-text" href="aboutus.php">About Us</a></li>
    							</ul>
    						</div>
 						 </nav>

								<div class="container">

  									<h2 align="center">Success!</h2>
									<h3 align="center">Your account has been created</h3>
  									<h6 align="center">Enter a Username and Password to get started.</h6>
 									 <h6 align="center">Please familliarize yourself with the rules before posting.</h6>
 									 <p align="center">&nbsp;</p>
  
  								 <div class="row">
   									 <form class="col s12">
    								  	<div class="row" align="center">
        									<div class="input-field col s6 container">
        									  <input placeholder="Username" id="usernametxt" type="text" name="usernametxt" class="validate" length="20">
       									 </div>
       							<div class="input-field col s6 container">
         							 <input placeholder="Password"id="passwordtxt" name="passwordtxt" type="password" class="validate" length="25">
          								<input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $_GET['id']; ?>" />
       									 </div>
        					  <div class="row" align="center">
                              
         							 <p>&nbsp;</p>
          							<p>&nbsp;</p>
                                    
        								 <button class="btn white black-text" type="submit" name="Submit" id="Submit" value="Submit">Submit</button>
     									 </div>
      								</div>
     							 </div>
      
       						 <div class="row">
         					  <div class="col s12 m6"  align="center">
         						 <div class="card blue-grey darken-1">
         						   <div class="card-content white-text">
         						     <span class="card-title">General Rules</span>
            			  <p>I. Check if the word is already avaliable before adding more vocabulary to the site in order to avoid duplicates.</p>
            			  <p>II. Avoid <b>misleading definitions and meanings</b> that do not relate to the SAT/ACT and help the community.</p>
            			  <p>III. Unnecessary words unrelated to the SAT/ACT (Example: House, Acrophobia, Athletics) are <b>not allowed.</b></p>
            		</div>
           						 <div class="card-action">
            						<a href="howto.php" target="_blank">How does Split Search work?</a>
           					 </div>
          					</div>
       					 </div>
        
           						<div class="col s12 m6"  align="center">
          							<div class="card blue-grey darken-1">
          							  <div class="card-content white-text">
             							 <span class="card-title">User Rules</span>
             			 <p>I. Being part of the SAT/ACT community entitles one to be <b>respectful and civil</b> towards other users.</p>
             			 <p>II. Try to avoid <b>unhelpful replies</b> that does not provide anyone with an answer. (Example: I don't know)</p>
             			 <p>III. Sharing personal information or advertising will result in <b>suspension of your account.</b></p>
            		</div>
          						  <div class="card-action">
           							   <a href="aboutus.php" target="_blank">About Us</a>
           						 </div>
         					 </div>
       					 </div>
      				 </div> 
      			</div>
			</form>
   		 </div> 
	</form>
				</body>
				</html>