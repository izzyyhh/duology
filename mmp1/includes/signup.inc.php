<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

include "../functions.php";
include "api.php";
require "dbcon.php";

    $username = trim(htmlspecialchars($_POST["username"]));
    $password = trim(htmlspecialchars($_POST["password"]));
    $repeatedpassword = trim(htmlspecialchars($_POST["repeatedpassword"]));

    if(empty($username) || empty($password) || empty($repeatedpassword)){
      echo "not all fields filled";
      exit();

    } else if(strlen($password) < 5){
        echo "password to short, should be at least 6 characters long";

    } else if($password == $repeatedpassword && !empty($username) && !empty($password) && !empty($repeatedpassword)){

        $query = "SELECT username FROM users WHERE username = ?";
        $sth = $dbh->prepare($query);

        $sth->execute(array($username));

        if(!$sth->fetch()){
          $insertstmt = "INSERT INTO users (username, password) VALUES (?,?)";
          $sth = $dbh->prepare($insertstmt);
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

          if($sth->execute(array($username, $hashedPassword))){
            $_SESSION["user"] = $username;
            $_SESSION["signup-completed"] = false;
            echo "ok";
            exit();
        } else{
          echo "database error, contact the dev";
        }


          } else{
            echo "username taken";
            exit();
          }



    } else{
      echo "passwords do not match";
      exit();

    }
?>
