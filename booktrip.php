<?php
  session_start();
  if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
     header('Location: book.php');
     exit;
  }
  
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
    <form method="post" action="trip_handler.php">
      <div class="input_box">
        <label for="name">Name:</label>
        <input value="<?php echo isset($_SESSION['form_account']['name']) ? $_SESSION['form_account']['name'] : ''; ?>"  type="text" id="name" name="name">
      </div>
      <div class="input_box">
        <label for="LastName">Last Name:</label>
        <input value="<?php echo isset($_SESSION['form_account']['LastName']) ? $_SESSION['form_account']['LastName'] : ''; ?>"  type="text" id="name" name="LastName">
      </div>
<div class="input_box">
        <label for="personId"> Personal ID:</label>
<input value="<?php echo isset($_SESSION['form_account']['personID']) ? $_SESSION['form_account']['personID'] : ''; ?>" type="text" id="name" name="personID">
  <br><br>
 <input type="radio" name="Destination" value="Arizona">Arizona
<input type="radio" name="Destination" <?php if (isset($Destination) && $destination=="Florida") echo "checked";?> value="Florida">Florida
<input type="radio" name="Destination" <?php if (isset($Destination) && $destination=="Idaho") echo "checked";?> value="Idaho">Idaho
<input type="radio" name="Destination" <?php if (isset($Destination) && $destination=="California") echo "checked";?> value="California">California
<input type="radio" name="Destination" <?php if (isset($Destination) && $destination=="Virginia") echo "checked";?> value="Virginia">Virginia
<input type="radio" name="Destination" <?php if (isset($Destination) && $destination=="Oregon") echo "checked";?> value="Oregon">Oregon 
<br><br>
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

