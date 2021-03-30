<?php
session_start();
require_once 'Dao.php';
$errors = array();
$pop = array();
$name = $_POST['name'];
$lastName = $_POST['LastName'];
$personID = $_POST['personID'];
$destination = $_POST['Destination'];
if (strlen($_POST['name'])>30) {
 $errors[] =  " Sorry your name  it is too long";

}

if (strlen($_POST['name']) ==0) {

 $errors[] =  " Sorry, name  box is empty";


}
if (strlen($_POST['LastName'])>30) {
 $errors[] =  " Sorry your LastName it is too long";

}

if (strlen($_POST['LastName'])==0) {

 $errors[] =  " Sorry, LastName  box is empty";


}
if (strlen($_POST['personID'])>10) {
 $errors[] =  " Sorry your ID it is too long";

}

if (strlen($_POST['personID'])==0) {

 $errors[] =  " Sorry, ID  box is empty";


}
if (is_numeric($_POST['personID'])) {
$dao = new Dao();
 $_SESSION['tripauthenticated'] = $dao->tripExist($personID);

  if ($_SESSION['tripauthenticated']) {
$errors[] = "That ID already exist";
}}
else{
 $errors[] =  " Sorry, ID  must be a number";

}
 if (empty($_POST['Destination'])) {
$errors[] =  "Choose a destination";
}



if (count($errors) > 0) {

$_SESSION['messages'] = $errors;
    $_SESSION['class'] = "bad_mojo";
    $_SESSION['form_account'] = $_POST;
    header('Location: booktrip.php');
    exit;
} else {
  $dao = new Dao();
 $dao->insertTrip ($_POST['name'], $_POST['LastName'],$_POST['personID'],$_POST['Destination']);
$_SESSION['form_account'] = array();
$booked[] =  "Trip succesfully booked";
  $_SESSION['class'] = "positive_vibes";
$_SESSION['messages'] = $booked;
$_SESSION['reservation'] = true;
header('Location: reservation.php');
exit;
}



?>

