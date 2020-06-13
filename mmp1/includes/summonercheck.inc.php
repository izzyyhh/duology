<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

include "api.php";
include "dbcon.php";
include "summoner.php";

$givenSummonername = $_POST["summonername"];
$summoner = new Summoner($givenSummonername);




if(RiotGamesAPI::$httpStatusCode != 404){

  $alreadyExistsQuery = "SELECT * FROM users WHERE summoner = ?";
  $alrSth = $dbh->prepare($alreadyExistsQuery);
  $alrSth->execute(array($summoner->name));
  
  if(! $alrSth->fetch()){
    $rankInfo = "Unranked";
    if($summoner->tier != "unranked") $rankInfo = $summoner->tier . " " . $summoner->rank;

    echo "
    <section class='card'>
      <h2>Is this you, Summoner?</h2>
      <br/>

      <h3>". htmlspecialchars($summoner->name) . "</h3>
      <p>Level " .  htmlspecialchars($summoner->lvl). "</p>
      <p> " .  htmlspecialchars($rankInfo) ."</p>
      <div class='summonerdetails'>

        <div class='profile-images'>
          <img class = 'profileicon' src='https://ddragon.leagueoflegends.com/cdn/10.8.1/img/profileicon/". htmlspecialchars($summoner->profileIconId).".png' alt='profileicon'>
          <img class = 'ranked-emblem' src='ranked-emblems/Emblem_". htmlspecialchars($summoner->tier).".png' alt='ranked emblem'>
        </div>


      </div>
    </section>
    ";

    echo "<div class='buttonline-sumcheck'><button id='no'>NO</button><button id='yes'>YES</button><div>";
  } else {
    echo "summoner taken";
  }

} else{
  echo "summoner nicht gefunden!";
}
 ?>
