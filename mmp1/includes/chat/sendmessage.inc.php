<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../../functions.php";
require "../dbcon.php";
require_once "../../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php";

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);

$from = $_SESSION["user"];
$to = $_POST["to"];
$message = trim($purifier->purify($_POST["message"]));


$insertStmt = "INSERT INTO chat_messages (from_user, to_user, message) VALUES (?, ?, ?)";
$insertHandle = $dbh->prepare($insertStmt);
$insertHandle->execute(array($from, $to, $message));

echo "message sent";
?>