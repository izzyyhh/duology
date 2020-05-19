<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/


if(isset($_POST["login-submit"])){
require "dbcon.php";
require "../functions.php";

$username = $_POST["username"];
$password = $_POST["password"];

  if(empty($username) || empty($password)){
    header("Location: ../index.php?error=emptyfields");
    exit();

  } else{

    $checkUsernameQuery = "SELECT * FROM users WHERE username = ?";
    $checkUsernameSth = $dbh->prepare($checkUsernameQuery);
    $checkUsernameSth->execute(array($username));


    if($result = $checkUsernameSth->fetch()){
      if(password_verify($password, $result->password)){
        session_start();
        $_SESSION["user"] = $result->username;

        #check if got summoner if not send to summonercheck.php
        $summonercheckQuery = "SELECT summoner FROM users WHERE username = ? AND summoner IS NOT NULL";
        $checkHandle = $dbh->prepare($summonercheckQuery);
        $checkHandle->execute(array($_SESSION["user"]));
        
        if($checkHandle->fetch()){
          $_SESSION["signedup"] = true;
          header("Location: ../main.php");
        } else{
          header("Location: ../summonercheck.php");
        }

        exit();

      } else{
        $_SESSION["message"] = "your password is incorrect";

        header("Location: ../index.php?username=" . urlencode($username));
        exit();
      }
    } else{
      $_SESSION["message"] = "this user does not exist";
      
      header("Location: ../index.php?user=404");
    }
  }
}

 ?>
