<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

$pagetitle ="DUOLOGY My duo partners";
require "includes/dbcon.php";
require "header.php";
require "includes/redirect-nonuser.php";

$partnersQuery =   "SELECT * FROM duo_partners
                    WHERE  user1 = ? OR user2 = ?";

$partnersHandle = $dbh->prepare($partnersQuery);
$partnersHandle->execute(array($_SESSION["user"], $_SESSION["user"]));
$myPartner = "my partner";
echo "<main>
        <h1>My partners</h1>
        <p class='mainhdesc'>HAVE A CHAT WITH YOUR PARTNERS";

if($result = $partnersHandle->fetchAll()){
    echo "<article class='list-container'>";
    
    foreach($result as $partner){

        if($partner->user1 != $_SESSION["user"]){
            $myPartner = htmlspecialchars($partner->user1);
        } else{
            $myPartner = htmlspecialchars($partner->user2);
        }

        #get summoner of partners and display somehing
        $getSummonerQuery =  "SELECT * FROM users
                                JOIN summoners ON users.summoner = summoners.name
                                WHERE users.username = ?";
        $summonerHandle = $dbh->prepare($getSummonerQuery);
        $summonerHandle->execute(array($myPartner));
        $summoner = $summonerHandle->fetch();

        echo "<section>
                <div class='list-card myboxshadow'>

                    <img class = 'list-emblem' src='ranked-emblems/Emblem_" . $summoner->tier . ".png' alt='Emblem " . $summoner->tier . "'>

                    <div class='list-name-roles-container'>
                        <div class='list-roles-container'>
                            <img src='assets/position-icons/position-" . $summoner->role1 . ".svg' alt='" . $summoner->role1 ." position icon'>
                            <img src='assets/position-icons/position-" . $summoner->role2 . ".svg' alt='" . $summoner->role2 ." position icon'>
                        </div>
                        <p class='user-as-summoner'>"
                    . $myPartner . " <small> as " . $summoner->name . "</small>
                        </p>
                    </div>
                    <div class='list-action-container'>
                        


                        <form id='" . $myPartner . "' action='includes/chat/deletepartner.inc.php' method='post'>
                            <input type='hidden' value='" . $myPartner . "' name='target'>
                            <button class='decline-request-btn startchat' name='to' value='" . $myPartner . "'><i class='fas fa-comment'></i></button>
                            <button class='decline-request-btn' name='delete' value='" . $myPartner . "'><i class='fas fa-times-circle'></i></button>
                        </form>
                    </div>
                </div>
            </section>";
    }

    echo "</article>";
}else{
    echo "<article>
           <h2 id='no-requests-heading'>You have no partners.</h2>
           </article>";}


echo "</main>";
?>

<div id="chatcontainer">
    <div id="chatboxcontainer" class="myboxshadow">
        <div id="chatbox">
            <section>
                <div id="chat-with"> <button id="removechat" style="cursor:pointer; border:none; background-color: #171A26; color: #1F8ECD; font-size: 2em; padding: 0 .3em;"><i class="fas fa-times-circle"></i></button><p>Chat with <span style="font-size: 1.2em; color: #1F8ECD;">user</span></p></div>
                    <div id="content-controlls-container">
                        <div id="chat-content">

                        </div>
                        <form id="chatcontrolls">
                            <label class="hidden" for="chatmessage">Your message</label>
                            <textarea placeholder="type in your message ..." name="chatmessage" id="chatmessage" cols="30" rows="3"></textarea>
                            <button id="sendmessage" style="cursor:pointer; border:none; background-color: #171A26; color: #1F8ECD; font-size: 2em; padding: 0 .3em;"><i class="fas fa-arrow-alt-circle-right"></i></button>
                        </form>
                    </div>
            </section>
        </div>
    </div>
</div>

<?php
require "footer.php";
?>