<?php
session_start();
include_once 'connection-info.php';
include_once 'header.html';
$topTenName = array();
$topTenScore = array();
$length = $_SESSION['ln'];

$sql = "SELECT * FROM highscore WHERE ln='$length' ORDER BY score desc";
$results = $conn->query($sql);
if($results->num_rows > 0){
    while($row = $results->fetch_assoc()){
      array_push($topTenName, $row['name']);
      array_push($topTenScore, $row['score']);
    }    
}
if(isset($_POST['playAgain'])){
  header('Location: hangman-game.php');
  unset($_POST['playAgain']);
}

if(isset($_POST['logout'])){
  unset($_SESSION);
  header('Location: login.php');
}

?>
<body>
<div class='container'>
    <div class='row'>
   <div class='col-sm-3'></div>
     <div class='col-sm-6'>
        <!-- high score board -->
      <div id='scoreBoard' class='bg-light border border-success rounded border-3 m-4'>
          <h3 class="text-decoration-underline text-center mt-4">Top Ten High Scores</h3>
          <h6 class='text-center'> (word length: <?php echo $length ?>) </h6>
          <ol>
          <?php 
            for ($i=0; $i < 10; $i++) { 
              echo "<li class='m-4'>$topTenName[$i] <span class='float-end'> $topTenScore[$i]</span></li>";
            }?>
          </ol>
      </div>
      <form action ='' method = 'post'>
        <button class="btn btn-primary m-4" type="submit" name="playAgain">Play Again</button>
        <button class="btn btn-primary" type="submit" name="logout">Logout</button>
      </form>
    </div></div>
    <div class='col-sm-3'></div>
</div>
</body>
</html>
