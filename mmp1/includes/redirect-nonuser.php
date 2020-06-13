<?php

if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit;
}

if(!userHasSummoner($dbh) && isset($_SESSION["user"])){
    header("Location: summonercheck.php");
}


?>