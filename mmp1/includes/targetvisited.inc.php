<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../functions.php";
require "dbcon.php";

if(isset($_SESSION["user"]) && isset($_SESSION["target"])){
    try{
        $user = $_SESSION["user"];
        $visitedUser = $_SESSION["target"];
        $insertQuery = "INSERT INTO visited (user1, user2) VALUES (?, ?)";
        $sth = $dbh->prepare($insertQuery);
        $sth->execute(array($user, $visitedUser));
        echo "marked visited";

    } catch(PDOException $e){
        echo "already visited";
    }

}

#long time no see
$deleteQuery = "DELETE FROM visited WHERE (now() - timestamp) > interval '60000 seconds'";
$deleteHandle = $dbh->prepare($deleteQuery);
$deleteHandle->execute();


?>