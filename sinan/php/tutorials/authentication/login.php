<?php
  session_start();
  //connect to database
  $db = mysqli_connect("localhost","root","","authentication");
  
  if(isset($_POST['login_btn'])) {
	  
	  $username = mysql_real_escape_string($_POST['username']);
	  
	  $password = mysql_real_escape_string($_POST['password']);
	 
	  
	$password= md5($password);//hashed password before
	$sql= "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($db, $sql);
	
	if(mysqli_num_rows($result)== 1){
		$_SESSION['message'] = "you are now logged in";
		$_SESSION['username'] = $username;
		header("location: home.php");//redirect to homepage
	}else{
	$_SESSION['message'] = "Username/password combination incorrect";
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
    <h1> login</h1>
  </div>
  
  
   
  
  
  <form method="post" action="login.php">
    <table>
	
	  <tr>
	     <td>Username:</td>
		 <td><input type="text" name="username" class="textInput"></td>
      </tr>	
       <tr>
	     <td>password:</td>
		 <td><input type="password" name="password" class="textInput"></td>
      </tr>		
      		
       <tr>
	     <td></td>
		<td><button><a href="http://localhost/tutorials/authentication/register.php">signup</a></button></td>
		 <td><input type="submit" name="login_btn" value="login"></td>
		 
      </tr>		  
  </body>
  </html>