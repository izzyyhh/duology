<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "functions.php";
$pagetitle = "DUOLOGY Your requests";
require "includes/dbcon.php";
require "header.php";

$requestsQuery =   "SELECT * FROM duo_requests
                    JOIN users
                    ON users.username = duo_requests.from_id
                    JOIN summoners
                    ON users.summoner = summoners.name
                    WHERE duo_requests.to_id = ?";

$requestsHandle = $dbh->prepare($requestsQuery);
$requestsHandle->execute(array($_SESSION["user"]));


?>

<main>
    <h1>Your Duo-Requests</h1>
    <p class="mainhdesc">ACCEPT IF YOU LIKE WHAT YOU SEE</p>
    <article id = "requests-list">
    <?php

    if($result = $requestsHandle->fetchAll()){



        foreach($result as $requester){
            $requesterTier = ($requester->tier == "unranked") ? "Unranked" : $requester->tier . " " . $requester->rank;
            $requesterWR = ($requester->losses != 0) ? round($requester->wins * 100 / ($requester->wins + $requester->losses)) : 100;
            
            if($requesterTier == "Unranked") $requesterWR = "n/a";

            echo    "
                    <section class = 'list-card myboxshadow card-fluid-size'> 
                        <img class = 'list-emblem' src='ranked-emblems/Emblem_" . $requester->tier . ".png' alt='Emblem " . $requester->tier . "'>
                            <div class='request-info'>
                                <h3>". $requester->username . "</h3>
                                <small>" . $requesterTier . "</small>
                                <div class='card-stats'>
                                    <p class='wr'>" . $requesterWR . "% <small>WR</small></p>
                                    <p>" . $requester->wins ."<small>W</small>" . " " . $requester->losses . "<small>L</small></p>
                                </div>
                            </div>

                        <div class='list-action-container request-actions'>
                            <form action='includes/partners.inc.php' method='post'>
                                <input type = 'hidden' name='requester' value='" . $requester->username . "'>
                                <button class='accept-request-btn' name='action' value='accept'><i class='fas fa-check-circle'></i></button>
                                <button class='decline-request-btn' name='action' value='ignore'><i class='fas fa-times-circle'></i></button>
                            </form>
                        </div>
                    </section>
                    ";
        }
    } else{
        echo "<h2 id='no-requests-heading'>You have no request.</h2>";
    }

    ?>
    </article>

</main>

<?php
require "footer.php";
?>