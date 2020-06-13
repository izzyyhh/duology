<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../../functions.php";
require "../dbcon.php";

$sessionUser = $_SESSION["user"];
$targetUser = $_POST["target"];

$selectMessagesQuery = "SELECT * FROM chat_messages WHERE (from_user = ? AND to_user = ?) OR (from_user = ? AND to_user = ?)";
$sth = $dbh->prepare($selectMessagesQuery);
$sth->execute(array($sessionUser, $targetUser, $targetUser, $sessionUser));

$allMessages = $sth->fetchAll();
$printableMessages = "";

foreach($allMessages as $message){
    if($message->from_user == $sessionUser){
        $printableMessages .= ("<p class='fromsessionusertext textbox'>" . htmlspecialchars($message->message) . "</p>");
    } else{
        $printableMessages.= ("<p class='tousertext textbox'>" . htmlspecialchars($message->message) . "</p>");
    }
}

echo $printableMessages;
?>