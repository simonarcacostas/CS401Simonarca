<?php
session_start();
require_once 'Dao.php';
$errors = array();
$pop = array();

if (strlen($_POST['name'])>10) {
 $errors[] =  " Sorry your ID  it is too long";

}


if (strlen($_POST['name'])==0) {

 $errors[] =  " Sorry, ID box is empty";


}

$dao = new Dao();
 $_SESSION['tripsauthenticated'] = $dao->tripExist($_POST['name']);

  if ($_SESSION['tripsauthenticated']) {
}
else {
$errors[] =  " Sorry, we did not found any trip with that ID";
}

if (count($errors) > 0) {

$_SESSION['messages'] = $errors;
    $_SESSION['class'] = "bad_mojo";
    $_SESSION['trips'] = $_POST;
$_SESSION['mytrips']="";    
header('Location: about.php');
    exit;
} else {
$_SESSION['trips'] = array();
$_SESSION['mytrips']=($_POST['name']);
 header('Location: about.php');
exit;
}



?>
