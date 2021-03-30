<?php
  session_start();
  if (!isset($_SESSION['reservation']) || !$_SESSION['reservation']) {
     header('Location: home.php');
     exit;
  }
unset($_SESSION['reservation']);
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
<?php
    if (isset($_SESSION['messages'])) {
      foreach ($_SESSION['messages'] as $message) {
        echo "<div class='" . $_SESSION['class'] . " message'>{$message}</div>";
      }
    }
    unset($_SESSION['messages']);
?>
<form action="home.php" method="post">
<input type='submit' name='submit' value='Home' class='input_box' />
</form>
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
