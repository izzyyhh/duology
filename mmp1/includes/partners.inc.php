<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../functions.php";
require "dbcon.php";

if(isset($_POST["action"]) && isset($_POST["requester"])){
    if($_POST["action"] == "accept"){
        $insertPartnersStmt = "INSERT INTO duo_partners (user1, user2) VALUES (?, ?)";
        $stmtHandle = $dbh->prepare($insertPartnersStmt);
        $stmtHandle->execute(array($_SESSION["user"], $_POST["requester"]));

        $deleteRequestStmt = "DELETE FROM duo_requests WHERE from_id = ? AND to_id = ?";
        $stmtHandle = $dbh->prepare($deleteRequestStmt);
        $stmtHandle->execute(array($_POST["requester"], $_SESSION["user"]));
        header("Location: ../duo-requests.php");
    } else{
        $deleteRequestStmt = "DELETE FROM duo_requests WHERE from_id = ? AND to_id = ?";
        $stmtHandle = $dbh->prepare($deleteRequestStmt);
        $stmtHandle->execute(array($_POST["requester"], $_SESSION["user"]));
        header("Location: ../duo-requests.php");
    }
}



?>