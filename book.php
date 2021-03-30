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
<p id="centerbox" class="tittle"> Log in to book a trip </p>
</div>
<div id="center">
 <form method="post" action="login_handler.php">
      <div class="input_box">
        <label for="username">Username:</label>
      <input value="<?php echo isset($_SESSION['form_login']['name']) ? $_SESSION['form_login']['name'] : ''; ?>" type="text" id="name" name="name">  </div>
      <br/>
      <div class="input_box">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
      </div>
      <input type="submit" value="Submit">  
 </form>
<form method="post" action="create_account.php">
<input type="submit" value="Create account">
</form>
<?php
    if (isset($_SESSION['messages'])) {
        echo $_SESSION['messages'];
      }
    
    unset($_SESSION['messages']);
?>
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

