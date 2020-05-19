<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../../functions.php";
require "../dbcon.php";

$from = $_SESSION["user"];
$to = $_POST["to"];
$message = trim(htmlspecialchars($_POST["message"]));


$insertStmt = "INSERT INTO chat_messages (from_user, to_user, message) VALUES (?, ?, ?)";
$insertHandle = $dbh->prepare($insertStmt);
$insertHandle->execute(array($from, $to, $message));

echo "message sent";
?>