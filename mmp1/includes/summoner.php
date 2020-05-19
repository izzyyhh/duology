<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

class Summoner{
  public $name;
  public $id;
  public $lvl;
  public $profileIconId;
  public $lp;

  public function __construct($summonername){
    #api calls
    $summonerV4Obj = RiotGamesAPI::summonerV4Request($summonername);
    $leagueV4Array = RiotGamesAPI::LeagueV4Request($summonername);


    $this->name = $summonerV4Obj->name;
    $this->id = $summonerV4Obj->id;
    $this->lvl = $summonerV4Obj->summonerLevel;
    $this->profileIconId = $summonerV4Obj->profileIconId;
    $this->tier = "unranked";
    $this->rank = "norank";
    $this->lp = 0;
    $this->wins = 0;
    $this->losses = 0;

    if(isset($leagueV4Array)){
      if(isset($leagueV4Array[1])){
        if($leagueV4Array[1]->queueType == "RANKED_SOLO_5x5"){
          $this->tier = $leagueV4Array[1]->tier;
          $this->rank = $leagueV4Array[1]->rank;
          $this->lp = $leagueV4Array[1]->leaguePoints;
          $this->wins = $leagueV4Array[1]->wins;
          $this->losses = $leagueV4Array[1]->losses;
        }
      }
      if(isset($leagueV4Array[0])){
        if($leagueV4Array[0]->queueType == "RANKED_SOLO_5x5"){
          #dont want ranked flex
          $this->tier = $leagueV4Array[0]->tier;
          $this->rank = $leagueV4Array[0]->rank;
          $this->lp = $leagueV4Array[0]->leaguePoints; 
          $this->wins = $leagueV4Array[0]->wins;
          $this->losses = $leagueV4Array[0]->losses;
        }
      }
    }
  }
}
 ?>
