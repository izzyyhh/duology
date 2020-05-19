<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

include "functions.php";
$pagetitle = "DUOLOGY Login";
include "header.php";

if(!isset($_SESSION["user"])){
?>

<main class="login-main">
  <h1>MEET PLAYERS</h1>
  <p class="mainhdesc">AND DOMINATE THE RIFT</p>
  <div>  
   <div class="login-box myboxshadow">
    <h1 id ="loginh1">DUOLOGY</h1>
        <form id="login-form" action="includes/login.inc.php" method="post">
          <div class="label-input-container">
            <input type="text" id="username" name="username" value="<?php if(isset($_GET["username"])) echo $_GET["username"];?>" autocomplete="off" required>
            <label for="username">Username</label>
          </div>
          <div class="label-input-container">
            <input type="password" name="password" id="password" required>
            <label for="password">Passwort</label>
            <div class="label-input-container">
              <div class="buttonholder">
                <button type="submit" id="login-submit" name="login-submit">Sign In</button>
              </div>
            </div>
          </div>
        </form>
        <p>You are new? <a href="signup.php">Sign up here</a></p>
        <p <?php if(!isset($_SESSION["message"])) echo "class='dpnone'";?> id="errorbox"><?php if(isset($_SESSION["message"])) echo $_SESSION["message"]; unset($_SESSION["message"]);?></p>
    </div>
  </div>
</main>

<?php
} else{
  #back click handle

  $summonercheckQuery = "SELECT summoner FROM users WHERE username = ? AND summoner IS NOT NULL";
  $checkHandle = $dbh->prepare($summonercheckQuery);
  $checkHandle->execute(array($_SESSION["user"]));

  if($checkHandle->fetch()){
    header("Location: main.php");
  }else{
    header("Location: summonercheck.php");
  }
  
}

include "footer.php";
?>
