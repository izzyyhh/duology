<?php

require_once "includes/dbcon.php";
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

ini_set('display_errors', true);

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

function userHasSummoner($dbh){
    if(isset($_SESSION["user"])){
        #check if got summoner if not send to summonercheck.php
        $summonercheckQuery = "SELECT summoner FROM users WHERE username = ? AND summoner IS NOT NULL";
        $checkHandle = $dbh->prepare($summonercheckQuery);
        $checkHandle->execute(array($_SESSION["user"]));
        
        if($checkHandle->fetch()){
            return true;
        } else{
            return false;
        }
    }
}
?>
