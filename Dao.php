<?php

class Dao {

  public $dsn = "mysql:dbname=heroku_0fb2ffe57cf7f0e;host=us-cdbr-east-03.cleardb.com";
  public $user = "b9ffd6caeb6e41";
  public $password = "6be12ab6";

  private function getConnection () {
    try {
        $connection = new PDO($this->dsn, $this->user, $this->password);
        
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        
    }
    return $connection;
  }
  public function userExist ($username, $password) {
    $connection = $this->getConnection();
    try {
        $q = $connection->prepare("select count(*) as total from accounts
 where username = :username and password = :password");
        $q->bindParam(":username", $username);
        $q->bindParam(":password", $password);
        $q->execute();
        $row = $q->fetch();
        if ($row['total'] == 1) {
           return true;
        } else {
           return false;
        }
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }

  }
  public function tripExist ($username) {
$connection = $this->getConnection();           
 try {
        $q = $connection->prepare("select count(*) as total from booktrip
 where person_ID = :username");
        $q->bindParam(":username", $username);
        $q->execute();
        $row = $q->fetch();
        if ($row['total'] == 1) {
           return true;
        } else {
           return false;
        }
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }

  }
    public function getTrips ($ID) {
    $connection = $this->getConnection();
    try {
        $rows = $connection->query("select name, lastName, person_ID,destination from booktrip where person_ID='$ID';", PDO::FETCH_ASSOC);
  return $rows;
} catch(Exception $e) {
echo 'getComments failed';
      echo print_r($e,1);

      exit;
    }
  }
  public function getComments () {
    $connection = $this->getConnection();
    try {
        $rows = $connection->query("select name, id, comment from reviews;", PDO::FETCH_ASSOC);
  return $rows;    
} catch(Exception $e) {
echo 'getComments failed';
      echo print_r($e,1);

      exit;
    }
  }
public function insertComment ($name, $comment) {
    
    $conn = $this->getConnection();
    $saveQuery = "insert into reviews (name, comment) values (:name, :comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }
public function createUser ($name, $comment) {

    $conn = $this->getConnection();
    $saveQuery = "insert into accounts (username, password) values (:name, :comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }
public function insertTrip ($name, $last,$ID,$destination) {
    
    $conn = $this->getConnection();
    $saveQuery = "insert into booktrip (name, lastName,person_ID,destination) values (:name, :comment, :ID, :destination  )";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $last);
    $q->bindParam(":ID", $ID);
    $q->bindParam(":destination", $destination);
    $q->execute();
  }

}
?>
