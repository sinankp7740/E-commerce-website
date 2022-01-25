<?php
  session_start();
  //connect to database
  $db = mysqli_connect("localhost","root","","authentication");
  
  if(isset($_POST['register_btn'])) {
	  
	  $username = mysql_real_escape_string($_POST['username']);
	  $email = mysql_real_escape_string($_POST['email']);
	  $password = mysql_real_escape_string($_POST['password']);
	  $password2 = mysql_real_escape_string($_POST['password2']);
	  
	  if($password == $password2){
		  $password= md5($password);//hash password before storing for security purpose
		  $sql = "INSERT INTO users(Username,email,password)VALUES('$username','$email','$password')";
		  mysqli_query($db,$sql);
		  $_SESSION['message']= "you are now logged in"; 
		  $_SESSION['username']= $username;
		  header("location:home.php");//redirect to home page
	  }else{
		 $_SESSION['message']= "The two passwords do not match"; 
	  }
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  </head>
  <body>
  <div class="header">
    <h1>register </h1>
  </div>
  
  
  
  
  
  
  
  
  <form method="post" action="register.php">
    <table>
	  <tr>
	     <td>Username:</td>
		 <td><input type="text" name="username" class="textInput"></td>
      </tr>	
        <tr>
	     <td>email:</td>
		 <td><input type="email" name="email" class="textInput"></td>
      </tr>		
        <tr>
	     <td>password:</td>
		 <td><input type="password" name="password" class="textInput"></td>
      </tr>		
        <tr>
	     <td> re-password:</td>
		 <td><input type="password" name="password2" class="textInput"></td>
      </tr>		
       <tr>
	     <td><button><a href="http://localhost/tutorials/authentication/login.php">login</a></button></td>
		 <td><input type="submit" name="register_btn" value="Register"></td>
      </tr>		  
  </body>
  </html>