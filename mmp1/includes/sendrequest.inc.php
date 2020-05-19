<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../functions.php";
require "dbcon.php";

#wenn yes insertstaement also request vorhanden; dann beim abfragen requests anzeigen auch nummer abfrage
if(isset($_POST["request"]) && $_POST["request"] == "yes"){

    try{
        $insertStmt = "INSERT INTO duo_requests (from_id, to_id) VALUES (?, ?)";
        $insertHandle = $dbh->prepare($insertStmt);
        $insertHandle->execute(array($_SESSION["user"], $_SESSION["target"]));
        echo "request sent";
    } catch(PDOException $e){
        echo "\nrequest cannot be sent";
        echo ", request already exists";
        echo "\nPDO-error: " . $e->getMessage();
    }
} else{
    echo "request not sent";
}
?>