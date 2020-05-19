<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../functions.php";
require "dbcon.php";
require "api.php";
require "summoner.php";

#long time no see
$deleteQuery = "DELETE FROM visited WHERE (now() - timestamp) > interval '600000000 seconds'";
$deleteHandle = $dbh->prepare($deleteQuery);
$deleteHandle->execute();


$username = $_SESSION["user"];

#visited on yourself, you dont want yourself to get suggested...

$visitedQuery = "SELECT * FROM visited WHERE user1 = ? AND user2 = ?";
$vsth = $dbh->prepare($visitedQuery);
$vsth->execute(array($username, $username));

if(!$vsth->fetch()){
    $insertVisitedStmt = "INSERT INTO visited (user1, user2) VALUES (?, ?)";
    $insVh  = $dbh->prepare($insertVisitedStmt);
    $insVh->execute(array($username, $username));
}


try{
    $targetFound = false;
    $targetQuery = "SELECT * FROM users WHERE summoner IS NOT NULL";
    $sth = $dbh->prepare($targetQuery);
    $sth->execute();

    while(!$targetFound){
        $target = $sth->fetch();


        $visitedQuery = "SELECT * FROM visited WHERE (user1 = ? AND user2 = ?) OR (user1 = ? AND user2 = ?)";
        $vsth= $dbh->prepare($visitedQuery);
        $vsth->execute(array($username, $target->username, $target->username, $username));
        
        $partnerQuery = "SELECT * FROM duo_partners WHERE (user1 = ? AND user2 = ?) OR (user1 = ? AND user2 = ?)";
        $partnerSth = $dbh->prepare($partnerQuery);
        $partnerSth->execute(array($username, $target->username, $target->username, $username));

        if(! ( ($visrslt = $vsth->fetch()) || $partnerSth->fetch() )){
            $targetFound = true;
            $_SESSION["target"] = $target->username;
            
            $targetSummoner = $target->summoner;
            
            $freshnessQuery = "SELECT EXTRACT(EPOCH FROM (NOW() - lastupdate)/60) FROM summoners WHERE name = ?";
            $freshnessSth = $dbh->prepare($freshnessQuery);
            $freshnessSth->execute(array($targetSummoner));
            $result = $freshnessSth->fetch();
            $freshnessValue = $result->date_part;
        
            if($freshnessValue > 60){
                $summoner = new Summoner($targetSummoner);
                $updateStmt = "UPDATE summoners SET level = ?, tier = ?, rank = ?, lp = ?, wins = ?, losses = ?, lastupdate = now() WHERE name = ?";
                $uh = $dbh->prepare($updateStmt);
                $uh->execute(array($summoner->lvl, $summoner->tier, $summoner->rank, $summoner->lp, $summoner->wins, $summoner->losses, $summoner->name));
            }


            $summonerQuery = "SELECT * FROM summoners
                                JOIN users ON users.summoner = summoners.name
                                WHERE name = ?";
                                
            $sqh = $dbh->prepare($summonerQuery);
            $sqh->execute(array($targetSummoner));
            $summonerData = $sqh->fetch();

            $summonerJson = json_encode($summonerData);
            
            header('Content-Type: application/json');
            echo $summonerJson;
        }
    }
} catch(Exception $e){
    echo $e->getMessage();
}

?>