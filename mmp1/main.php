<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

$pagetitle = "DUOLOGY Find your dream partner";
require "header.php";
require "includes/redirect-nonuser.php";

?>

<form class="hidden" id="yesform" action="loadpartner.inc.php">
    <input type="hidden" name="request" value="yes">
</form>

<form class="hidden" id="noform" action="loadparnter.inc.php">
    <input type="hidden" name="request" value="no">
</form>

<form class="hidden" action="loadparnter.inc.php">
    <input type="hidden" name="request" value="start">
</form>


<main>
<h1>Discover new player</h1>
<p class="mainhdesc">FIND YOUR DUO PARTNER</p>
  <section>
    <div class="summonercard-container myboxshadow">
      <div id="gifLoader" class="dpnone">
        <img src="assets/load01.gif" alt="gif animated loader">
      </div>

        <div id="summonercard" class="hidden">

          <div class="basicinfocontainer">
            <div class="champbgcard"><img id="champbg" src="" alt="main champion"></div>
            <div class="tierimg">
              <img id = "tierimg" class = "ranked-emblem" alt="ranked emblem">
            </div>
            <div class="summonerbasicinfo">
              <h2 id ="summonername">summonername</h2>
              <p id = "summonertier">tier rank | lp</p>
            </div>
          </div>

          <div>
            <p id="summonerquote">
              hey i'd like to find a jungler to dominate everyhting in the game!
            </p>
          </div>
          <div class="roles-champs">
            <div class="roles">
              <div><img id="role1" src="assets/position-icons/position-Jungle.svg" alt="main role"></div>
              <div><img id="role2" src="assets/position-icons/position-Jungle.svg" alt="secondary role"></div>
            </div>
            <div class="champs">
              <div><img id="champ1" src="https://ddragon.leagueoflegends.com/cdn/10.8.1/img/champion/Nidalee.png" alt="main champion"></div>
              <div><img id="champ2" src="https://ddragon.leagueoflegends.com/cdn/10.8.1/img/champion/Nidalee.png" alt="favourite champion"></div>
              <div><img id="champ3" src="https://ddragon.leagueoflegends.com/cdn/10.8.1/img/champion/Nidalee.png" alt="second favourite champion"></div>
            </div>

          </div>
          <div id=stats-container>
            <p id="summonerwinloss">WinLoss</p>
            <p id="summonerwr">Wins%</p>
          </div>

        </div>
    </div>
  </section>

  <div class = "buttonline">
      <button id ="norequest"><i class="fas fa-times"></i>&nbsp;no!</button>
      <button id="sendrequest"><i class="fas fa-heart"></i>&nbsp;yeah!</button>
  </div>
</main>

<script src="js/partner.js"></script>
<?php
require "footer.php";
?>
