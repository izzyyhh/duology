<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

include "functions.php";
$pagetitle = "DUOLOGY Sign Up";
include "header.php";

if(isset($_SESSION["user"]) && userHasSummoner($dbh)) {
  header("Location: main.php");
} else if(isset($_SESSION["user"])){
  header("Location: summonercheck.php");
}

?>
<main class="signup-main">
  <h1>Welcome summoner!</h1>
  <section>
  <div class="login-box" id="signup-box">
      <h2>DUOLOGY</h2>
      <p style="text-align:center; margin-bottom: 20px; font-weight:bold; width:300px;">Sign up and meet other players! Who knows, maybe you'll find your duopartner of your dreams.</p>
      <form id="signup-form" class="signingform" action="summonercheck.php" method="post">
        <div class="label-input-container">  
        <input type="text" maxlength="15" name="username" autocomplete="off" id="username" required>
          <label for="username">username</label>
        </div>
        <div class="label-input-container">
          <input type="password" name="password" id="passwordSignup" required>
          <label for="passwordSignup">password</label>
        </div>
        <div class="label-input-container">
          <input type="password" name="repeatedpassword" id="repeatedpassword" required>
          <label for="repeatedpassword">repeat password</label>
        </div>
        <button type="submit" name="signup">Sign Up</button>
        <p id="errorbox">here is errortext</p>
      </form>
  </div>
  </section>
</main>
<script type="text/javascript" src="js/register.js"></script>
<?php
include "footer.php";
 ?>
