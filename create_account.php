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
<div id="centerbox">
<p id="centerbox" class="tittle"> Create an user </p>
</div>
<div id="body">
    <form method="post" action="account_handler.php">
      <div class="input_box">
        <label for="name">Username:</label>
        <input value="<?php echo isset($_SESSION['form_user']['name']) ? $_SESSION['form_user']['name'] : ''; ?>"  type="text" id="name" name="name">
      </div>
      <div class="input_box">
        <label for="LastName">Password:</label>
        <input value="<?php echo isset($_SESSION['form_user']['LastName']) ? $_SESSION['form_user']['LastName'] : ''; ?>"  type="password" id="name" name="LastName">
      
  <br><br>
<input class = "input_box" type="submit" value="Create Account">
    
<?php
    if (isset($_SESSION['messages'])) {
      foreach ($_SESSION['messages'] as $message) {
        echo "<div class='" . $_SESSION['class'] . " message'>{$message}</div>";
      }
    }
    unset($_SESSION['messages']);
?>
</form>
</div>
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


