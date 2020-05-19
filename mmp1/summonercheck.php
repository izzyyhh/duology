<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

include "functions.php";
$pagetitle = "DUOLOGY Sign up";
include "header.php";
 ?>
    <main class='signup-main'>
      <div>
        <h1 class="signuph">Welcome <?= $_SESSION["user"]?>!</h1>
        <p class="mainhdesc signupdesc">COMPLETE THE SIGNUP</p>
          <div>
            <div class="login-box myboxshadow">
              <form id ="summonercheck" action="main.php" method="post">
                <div class="summonerlookup">
                  <div class="label-input-container">
                      <input id="summonername-check" type="text" autocomplete="off" name="summonername" required>
                      <label for="summonername-check">Summonername</label>
                  </div>
                </div>
                  <input type="hidden" name="username" value="<?php echo $_SESSION["user"]?>">
                    <div id ="roles-champs-select" class="card">
                        <h3 class="desc">Select 2 main roles</h3>
                        <select name="roles[]" id="multiple-roles" multiple>
                            <option value="Top">Top</option>
                            <option value="Mid">Mid</option>
                            <option value="Jungle">Jungle</option>
                            <option value="Bottom">Bottom</option>
                            <option value="Support">Support</option>
                        </select>
                        <h3 class="desc">Select 3 favourite champions</h3>
                        <select name="champions[]" id="multiple-champions" multiple>
                            <option value="Aatrox">Aatrox</option>
                            <option value="Ahri">Ahri</option>
                            <option value="Akali">Akali</option>
                            <option value="Alistar">Alistar</option>
                            <option value="Amumu">Amumu</option>
                            <option value="Anivia">Anivia</option>
                            <option value="Annie">Annie</option>
                            <option value="Aphelios">Aphelios</option>
                            <option value="Ashe">Ashe</option>
                            <option value="AurelionSol">Aurelion Sol</option>
                            <option value="Azir">Azir</option>
                            <option value="Bard">Bard</option>
                            <option value="Blitzcrank">Blitzcrank</option>
                            <option value="Brand">Brand</option>
                            <option value="Braum">Braum</option>
                            <option value="Caitlyn">Caitlyn</option>
                            <option value="Camille">Camille</option>
                            <option value="Cassiopeia">Cassiopeia</option>
                            <option value="Chogath">Chogath</option>
                            <option value="Corki">Corki</option>
                            <option value="Darius">Darius</option>
                            <option value="Diana">Diana</option>
                            <option value="Draven">Draven</option>
                            <option value="DrMundo">Dr Mundo</option>
                            <option value="Ekko">Ekko</option>
                            <option value="Elise">Elise</option>
                            <option value="Evelynn">Evelynn</option>
                            <option value="Ezreal">Ezreal</option>
                            <option value="Fiddlesticks">Fiddlesticks</option>
                            <option value="Fiora">Fiora</option>
                            <option value="Fizz">Fizz</option>
                            <option value="Galio">Galio</option>
                            <option value="Gangplank">Gangplank</option>
                            <option value="Garen">Garen</option>
                            <option value="Gnar">Gnar</option>
                            <option value="Graves">Graves</option>
                            <option value="Hecarim">Hecarim</option>
                            <option value="Heimerdinger">Heimerdinger</option>
                            <option value="Illaoi">Illaoi</option>
                            <option value="Irelia">Irelia</option>
                            <option value="Ivern">Ivern</option>
                            <option value="Janna">Janna</option>
                            <option value="JarvanIV">Jarvan IV</option>
                            <option value="Jax">Jax</option>
                            <option value="Jhin">Jhin</option>
                            <option value="Jinx">Jinx</option>
                            <option value="Kaisa">Kalista</option>
                            <option value="Karma">Karma</option>
                            <option value="Karthus">Karthus</option>
                            <option value="Kassadin">Kassadin</option>
                            <option value="Katarina">Katarina</option>
                            <option value="Kayle">Kayle</option>
                            <option value="Kayn">Kayn</option>
                            <option value="Kennen">Kennen</option>
                            <option value="Khazix">Khazix</option>
                            <option value="Kindred">Kled</option>
                            <option value="KogMaw">Kog Maw</option>
                            <option value="Leblanc">Leblanc</option>
                            <option value="LeeSin">Lee Sin</option>
                            <option value="Leona">Leona</option>
                            <option value="Lissandra">Lissandra</option>
                            <option value="Lucian">Lucian</option>
                            <option value="Lulu">Lulu</option>
                            <option value="Lux">Lux</option>
                            <option value="Malphite">Malphite</option>
                            <option value="Malzahar">Malzahar</option>
                            <option value="Maokai">Maokai</option>
                            <option value="MasterYi">Master Yi</option>
                            <option value="MissFortune">MissFortune</option>
                            <option value="MonkeyKing">Wukong</option>
                            <option value="Mordekaiser">Mordekaiser</option>
                            <option value="Morgana">Morgana</option>
                            <option value="Nami">Nami</option>
                            <option value="Nasus">Nasus</option>
                            <option value="Nautilus">Nautilus</option>
                            <option value="Neeko">Neeko</option>
                            <option value="Nidalee">Nidalee</option>
                            <option value="Nocturne">Nocturne</option>
                            <option value="Nunu">Nunu</option>
                            <option value="Olaf">Olaf</option>
                            <option value="Orianna">Orianna</option>
                            <option value="Ornn">Ornn</option>
                            <option value="Pantheon">Pantheon</option>
                            <option value="Poppy">Poppy</option>
                            <option value="Pyke">Pyke</option>
                            <option value="Qiyana">Qiyana</option>
                            <option value="Quinn">Quinn</option>
                            <option value="Rakan">Rakan</option>
                            <option value="Rammus">Rammus</option>
                            <option value="RekSai">Rek Sai</option>
                            <option value="Renekton">Renekton</option>
                            <option value="Rengar">Rengar</option>
                            <option value="Riven">Riven</option>
                            <option value="Rumble">Rumble</option>
                            <option value="Ryze">Ryze</option>
                            <option value="Sejuani">Sejuani</option>
                            <option value="Senna">Senna</option>
                            <option value="Sett">Sett</option>
                            <option value="Shaco">Shaco</option>
                            <option value="Shen">Shen</option>
                            <option value="Shyvana">Shyvana</option>
                            <option value="Singed">Singed</option>
                            <option value="Sion">Sion</option>
                            <option value="Sivir">Sivir</option>
                            <option value="Skarner">Skarner</option>
                            <option value="Sona">Sona</option>
                            <option value="Soraka">Soraka</option>
                            <option value="Swain">Swain</option>
                            <option value="Sylas">Sylas</option>
                            <option value="Syndra">Syndra</option>
                            <option value="TahmKench">TahmKench</option>
                            <option value="Taliyah">Taliyah</option>
                            <option value="Talon">Talon</option>
                            <option value="Taric">Taric</option>
                            <option value="Teemo">Teemo</option>
                            <option value="Thresh">Thresh</option>
                            <option value="Tristana">Tristana</option>
                            <option value="Trundle">Trundle</option>
                            <option value="Tryndamere">Tryndamere</option>
                            <option value="TwistedFate">Twisted Fate</option>
                            <option value="Twitch">Twitch</option>
                            <option value="Udyr">Udyr</option>
                            <option value="Urgot">Urgot</option>
                            <option value="Varus">Varus</option>
                            <option value="Vayne">Vayne</option>
                            <option value="Veigar">Veigar</option>
                            <option value="Velkoz">Velkoz</option>
                            <option value="Vi">Vi</option>
                            <option value="Viktor">Viktor</option>
                            <option value="Vladimir">Vladimir</option>
                            <option value="Volibear">Volibear</option>
                            <option value="Warwick">Warwick</option>
                            <option value="Xayah">Xayah</option>
                            <option value="XinZhao">Xin Zhao</option>
                            <option value="Yasuo">Yasuo</option>
                            <option value="Yorick">Yorick</option>
                            <option value="Yuumi">Yuumi</option>
                            <option value="Zac">Zac</option>
                            <option value="Zed">Zed</option>
                            <option value="Ziggs">Ziggs</option>
                            <option value="Zilean">Zilean</option>
                            <option value="Zoe">Zoe</option>
                            <option value="Zyra">Zyra</option>

                        </select>
                        <h3 class="desc">Your quote, seen by other users</h3>
                        <textarea maxlength="137" name="summonerquote" id="summonerquote-signup" cols="30" rows="4" placeholder="Hello there it's me, I'm lookin' for ..."></textarea>
                    <button id="realsubmit">Submit</button>
                  </div>

                <button class="summonerlookup" type="submit" name="button">Look Up</button>
              </form>
              <div id="gifLoader" class="signupLoader">
                <img src="assets/load01.gif" alt="gif animated loader">
              </div>
            </div>
          </div>

          <div class="card" id="summonerinfo"></div>

      </div>
    </main>


      <script src="js/summonercheck.js"></script>
      <script src="js/slimselect/slimselect.min.js"></script>
      <script>
        setTimeout(function() {
          new SlimSelect({
            select: '#multiple-roles',
            limit: 2,
            hideSelectedOption: true,
            searchingText: "searching role",
            searchText: "no role found",
            searchPlaceholder: "search you role",
            placeholder: "select roles",
            deselectLabel: "<span>XXX</span>",
          })
        }, 300);

        setTimeout(function() {
          new SlimSelect({
            select: '#multiple-champions',
            limit: 3,
            hideSelectedOption: true,
            searchingText: "searching champion",
            searchText: "no champion found",
            searchPlaceholder: "search your champions",
            placeholder: "select champions",
            deselectLabel: "<span>XXX</span>",
          })
        }, 300);
      </script>
<?php
include "footer.php";
?>