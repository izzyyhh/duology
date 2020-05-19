<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

    $apikey = "YOUR API KEY HERE";

    if ($_SERVER['HTTP_HOST'] == 'users.multimediatechnology.at') {
        $DB_NAME = "";
        $DB_USER = "";
        $DB_PASS = ""; 
        $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
    } else {
        $DB_NAME = "";
        $DB_USER = ""; 
        $DB_PASS = ""; 
        $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
    }
?>
