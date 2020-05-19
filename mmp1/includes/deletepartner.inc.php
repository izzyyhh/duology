<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "../functions.php";
require "dbcon.php";

$deletePartnershipStmt = "DELETE FROM duo_partners WHERE (user1 = ? AND user2 = ?) OR (user1 = ? AND user2 = ?)";
$deleteStmtHandle = $dbh->prepare($deletePartnershipStmt);
$deleteStmtHandle->execute(array($_SESSION["user"], $_POST["delete"], $_POST["delete"], $_SESSION["user"]));

header("Location: ../my-partners.php");



?>