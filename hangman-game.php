<? 
session_start();
include_once 'header.html';
include_once 'connection-info.php';

$user = $_SESSION['username'];


//validate user logged in
if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

//put letters a-z in an array for UI
$letters = array();
$a = 'a';
for ($i=0; $i < 26; $i++) {
    $letters[$i] = $a++;
}

//get random word from database returns array word and length
if(!isset($_POST['showScores'])){
  $word = getWordsDB($conn);
  $length = $word[1];
  $hangmanWord = $word[0];
}
// update high score table
if(isset($_POST['showScores'])){
  $highScore = intval($_POST['highscore']);
  $ln = $_POST['ln'];
  $sql = "INSERT INTO highscore (id, name, score, ln ) VALUES (NULL, '$user', '$highScore', '$ln')";
  $conn->query($sql);
  $_SESSION['ln'] = $_POST['ln'];
  header("Location: high-scores.php"); 
}



//logout
if(isset($_POST['Logout'])){
    unset($_SESSION);
    $conn->close();
}

function getWordsDB($conn){
  $sql = "SELECT * FROM animals";
  $results = $conn->query($sql);
  if($results->num_rows>0){
      while($row = $results->fetch_assoc()){
          $line[] = $row['name'];
          $length[] = $row['length'];
      }
  }
  $index = rand(0,count($line));
  $word = $line[$index];
  return array($word, $length[$index]);
}
?>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="">HANGMAN</a>
  
    <div class="navbar " id="mynavbar">
      <form class="d-flex" method="post" action="login.php">
        <button class="btn btn-primary" type="submit" name="Logout">Logout</button>
      </form>
    </div>
  </div>
</nav>
<!-- Welcome user -->
<div class='container-fluid'>
  <div class='row'>
    <div class='col'>
      <h3><?php echo "Welcome, $user! <span class='float-end' id='points'>
      Score: 0 points</span>"; ?></h3>
    </div>
 
  </div>
</div>
<div class='container mb-4'>
  <div class='row mt-4'>
    <div class='text-center'>
      <h1>Category: <i class='text-sucess'>Animals</i></h1>
      <?php
        for ($i = 0; $i < $length; $i++) {
            $id = $hangmanWord[$i]. $i;
            echo "<input id='$id' value=' ' type='button' 
            class='wBtn wl' name='$id'>";
        }
        ?> 
    </div>
  </div>
  <div class='row'>
    <div class='col-sm-3'></div>
    <!-- a-z buttons -->
    <div class='col-sm-6' >
      <div id='btnGp'>
        <?php
        foreach($letters as $letter){
          echo "<button class='btn gBtn bg-light m-1' type='button' id='$letter' 
          onclick='btnClicked(this.id)' name='$letter'>$letter</button>";
        }?>

     <form class='mt-4' id='form' action ='' method ='post' hidden>
        <input type='text' id='ln' name='ln' hidden>
        <input type='text' id='highscore' name='highscore' hidden>
        <button class="btn btn-primary" type="submit" name="showScores">Show High Scores</button>
      </form>
    <div class='col-sm-3'>
      <p id='wordLength' hidden> <?php echo $length; ?> </p>
    </div>
  </div>
</div>
</body>
</html>

