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
        session_regenerate_id(true);
        
        //session_destroy();
        //unset($_SESSION);
        //session_start();

        $_SESSION["user"] = $result->username;
        
        if(userHasSummoner($dbh)){
          header("Location: ../main.php");
        } else{
          header("Location: ../summonercheck.php");
        }

        exit();

      } else{
        $_SESSION["message"] = "Login invalid";

        header("Location: ../index.php?username=" . urlencode($username));
        exit();
      }
    } else{
      $_SESSION["message"] = "Login invalid";
      
      header("Location: ../index.php");
    }
  }
}

 ?>
