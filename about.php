<?php
  session_start();
?>
<html>
  <head>
<img class="logo" src="logo.png"/>
<link rel="stylesheet" href="stylehome.css">
<link rel="stylesheet" href="comment.css">
</head>
  <body>
         <div id="navigation">
      <ol>
        <li><a href="home.php">Destinations</a></li>
        <li><a href="review.php">Reviews</a></li>
        <li><a href="about.php">Check trip</a></li>
      </ol>

</div>
<br>
<div class="body">
<form method="post" action="gettrips.php">
     <div class="input_box">
        <label for="name">ID</label>
        <input value="<?php echo isset($_SESSION['trips']['name']) ? $_SESSION['trips']['name'] : '';  ?>" type="text" id="name" name="name">      </div>
 <input class = "input_box" type="submit" value="Submit">
    </form>

<?php
    if (isset($_SESSION['messages'])) {
      foreach ($_SESSION['messages'] as $message) {
        echo "<div class='" . $_SESSION['class'] . " message'>{$message}</div>";
      }
    }
    unset($_SESSION['messages']);
?>
   <table id="comments">
      <thead>
        <tr>
          <th>Name</th>
          <th>Last name</th>
 <th>ID</th>
 <th>Destination</th>
        </tr>
      </thead>
      <tbody>
<?php

    $ID = $_SESSION['mytrips'];
 require_once 'Dao.php';
    $dao = new Dao();
    $comments = $dao->getTrips($ID);
          foreach ($comments as $comment) {

            echo " <tr><td>{$comment['name']}</td>
            <td> ". htmlspecialchars($comment['lastName'])."
            <td> " . htmlspecialchars($comment['person_ID'])."
           <td> " . htmlspecialchars($comment['destination'])."</td></tr>";}
 unset($_SESSION['myytrips']);
 ?>
      </tbody>
    </table>
</div>
<div id="bottom">
<p><span class="tittle" >Famous Routes<span>
</p>
<ol>
        <li><a class="white" href="https://en.wikipedia.org/wiki/Oregon_Trail">The Oregon trail</a></li>
        <li><a class="white" href="https://en.wikipedia.org/wiki/U.S._Route_101">Route 101</a></li>
        <li><a class="white" href="https://www.blueridgeparkway.org">Blue Ridge Parkway</a></li>
      </ol>
</div>

</body>
</html>

