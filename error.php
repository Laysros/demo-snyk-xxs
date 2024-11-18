<?php
  session_start();
  session_unset();

  $_SESSION['msg'] = 'Something went wrong. You have been logged out for security reasons.';

  header("Location: index.php");
  exit;
?>