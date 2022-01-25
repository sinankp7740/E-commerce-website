<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  </head>
  <body>
  <div class="header">
    <h1>register login</h1>
  </div>
  <?phpif(isset($_SESSION['message'])){
	  echo"<div id=''error_msg>".$_SESSION['message']."</div>";  
	  unset($_SESSION['message']);}
	  ?>
  
<h1>home</h1>
<div><h4>Welcome<?php echo $_SESSION['username'];?></h4></div>	  
<div><a href="logout.php">Logout</a></div>
  </body>
  </html>