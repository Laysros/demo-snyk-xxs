<?php
  session_start();
  require_once ('db.php');

  if(!$_SESSION['user']){
    header("Location: index.php");
	  exit;
  }

  if(check_access($_GET['id'], $_SESSION['user'])){
    $_SESSION['file_id'] = $_GET['id'];
    header("Location: display_data.php");
	  exit;
  } else {
    header("Location: error.php");
	  exit;
  }
?>