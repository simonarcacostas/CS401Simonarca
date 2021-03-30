<?php
session_start();
require_once 'Dao.php';
$errors = array();
$pop = array();
$username = $_POST['name'];
$password = $_POST['LastName'];
if (strlen($_POST['name'])>30) {
 $errors[] =  " Sorry your name  it is too long";

}

if (strlen($_POST['name']) <5) {

 $errors[] =  " Sorry, name  box is too small, minimum 5 characters";


}
if (strlen($_POST['LastName'])>30) {
 $errors[] =  " Sorry your password it is too long";

}

if (strlen($_POST['LastName'])<5) {

 $errors[] =  " Sorry, password is too small, minimum 5 characters";


}

$dao = new Dao();
 $_SESSION['userauthenticated'] = $dao->userExist($username,$password);

  if ($_SESSION['userauthenticated']) {
$errors[] = "Sorry, that user already exist";
}

if (count($errors) > 0) {

$_SESSION['messages'] = $errors;
    $_SESSION['class'] = "bad_mojo";
    $_SESSION['form_user'] = $_POST;
    header('Location: create_account.php');
    exit;
} else {
  $dao = new Dao();
 $dao->createUser($_POST['name'], $_POST['LastName']);
$_SESSION['form_user'] = array();
 $_SESSION['class'] = "positive_vibes";
$_SESSION['messages'] = "Account succesfully created";
$_SESSION['reservation'] = true;
header('Location: book.php');
exit;
}



?>

