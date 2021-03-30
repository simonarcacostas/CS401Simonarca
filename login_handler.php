<?php
  session_start();
   
  $username = $_POST['name'];
  $password = $_POST['password'];

  // check the email and password
  require_once 'Dao.php';
  $dao = new Dao();
  $_SESSION['authenticated'] = $dao->userExist($username, $password);

  if ($_SESSION['authenticated']) {    
     $_SESSION['form_login'] = array();
     header('Location: booktrip.php');
     exit;
  } else {
     $_SESSION['messages'] = "Sorry, we could not authenticated you";
 $_SESSION['form_login'] = $_POST;     
header('Location: book.php');
     exit;
  }
