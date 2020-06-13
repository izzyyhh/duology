<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

include "../functions.php";
require "dbcon.php";
require "api.php";
require "summoner.php";
require_once "../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php";

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
#take champions[] und roles[] safe them und handle wenn kleiner als 3 und 2 am besten mit js


if(isset($_POST["summonername"]) && isset($_POST["username"])){
    $summonername = trim($purifier->purify($_POST["summonername"]));
    $username = trim($purifier->purify($_POST["username"]));

    $summoner = new Summoner($summonername);
    #var_dump($summoner->rank);
    $query = "SELECT * FROM summoners WHERE name = ?";
    $sth = $dbh->prepare($query);
    $sth->execute(array($summoner->name));

    if(!$sth->fetch()){
        #not existent, so insert
        $insertStmt = "INSERT INTO summoners (name, level, tier, rank, wins, losses, lp, role1, role2, favchamp1, favchamp2, favchamp3, quote) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $ih = $dbh->prepare($insertStmt);

        $ih->execute(array($summoner->name, $summoner->lvl, $summoner->tier, $summoner->rank, $summoner->wins, $summoner->losses, $summoner->lp, $_POST["roles"][0], $_POST["roles"][1], $_POST["champions"][0], $_POST["champions"][1], $_POST["champions"][2], trim($purifier->purify($_POST["summonerquote"]))));
    }

        
    $alreadyExistsQuery = "SELECT * FROM users WHERE summoner = ?";
    $alrSth = $dbh->prepare($alreadyExistsQuery);
    $alrSth->execute(array($summoner->name));

    if(!$alrSth->fetch()){
        try{
            $updateStmt = "UPDATE users SET summoner = ? WHERE username = ?";
            $dbh->beginTransaction();

            $uh = $dbh->prepare($updateStmt);
            $uh->execute(array($summoner->name, $username));
    
            $dbh->commit();

            echo "success";

        } catch(Exception $e){
            $dbh->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }   
}

?>