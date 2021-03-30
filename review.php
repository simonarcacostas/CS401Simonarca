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
    <form method="post" action="comment_handler.php">
      <div class="input_box">
        <label for="name">Name:</label>
        <input value="<?php echo isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : ''; ?>"  type="text" id="name" name="name">
      </div>
      <div class="input_box">
        <label for="comment">Comment:</label>
        <input value="<?php echo isset($_SESSION['form_data']['comment']) ? $_SESSION['form_data']['comment'] : ''; ?>"  type="text" id="comment" name="comment">
      </div>
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
<?php
    require_once 'Dao.php';
    $dao = new Dao();
    $comments = $dao->getComments();
?>
    <table id="comments">
      <thead>
        <tr>
          <th>Name</th>
          <th>Comments</th>
        </tr>
      </thead>
      <tbody>
<?php
          foreach ($comments as $comment) {

            echo "<tr><td>{$comment['name']}</td>
            <td>".  htmlspecialchars($comment['comment'])."</td></tr>";}

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
