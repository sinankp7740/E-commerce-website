<?php

  session_start();
  session_destroy();
  unset($_SESSION['username']);
  $_SESSION['message'] ="you are now loggesd out";
  header("location: login.php");
  ?>