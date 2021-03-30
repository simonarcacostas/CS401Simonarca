<?php
session_start();
require_once 'Dao.php'; 
$errors = array();

if (strlen($_POST['name'])>30) {

 $errors[] =  " Sorry your name it is too long";
 
}
if (strlen($_POST['comment'])>255) {

 $errors[] =  " Sorry your comment it is too long";

}
if (strlen($_POST['name'])==0) {

 $errors[] =  " Sorry, name box is empty";

}
if (strlen($_POST['comment'])==0) {

 $errors[] =  " Sorry, comment box is empty";

}

if (count($errors) > 0) {
    $_SESSION['messages'] = $errors;
    $_SESSION['class'] = "bad_mojo";
    $_SESSION['form_data'] = $_POST;
    header('Location: review.php');
    exit;
  } else {
    $_SESSION['class'] = "positive_vibes";
    $_SESSION['messages'] = array("Thanks for posting!");
    $_SESSION['form_data'] = array();
  }

  $dao = new Dao();
  $dao->insertComment($_POST['name'], $_POST['comment']);

  header('Location: review.php');
  exit;
?>
