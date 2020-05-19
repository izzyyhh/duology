<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

include "../functions.php";

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
  setcookie(
    session_name(),
    '',
    time()-42000,
    '/'
  );
}
session_destroy();

header("Location: ../index.php");
exit();
?>
