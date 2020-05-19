
<footer>
<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

    if(isset($_SESSION["user"])){
    ?>  

  <div id="tab-navigation" class="nav-tab">
    <nav>
      <div class="a-tab">
        <a id="requests" href="duo-requests.php">
          <i class="fas fa-user-plus"></i>
          <small>Duo requests</small>
        </a>
      </div>
      <div class="a-tab">
        <a id="discover" href="main.php">
          <i class="far fa-compass"></i>
          <small>Discover</small>
        </a>
      </div>
      <div class="a-tab">
        <a id="partners" href="my-partners.php">
        <i class="fas fa-users"></i>
        <small>My partners</small>
        </a>
      </div>
      <div class="a-tab">
        <a id="logout" href="includes/logout.inc.php">
          <i class="fas fa-sign-out-alt"></i>
          <small>Log out</small>        
        </a>
      </div>
    </nav>
  </div>

  <?php
  }
  ?>

<div class="footertext">
  <h2>DUOLOGY 2020</h2>
</div>
<div class="footerlinks">
  <a href="impressum.php">Impressum</a>
  <a href="https://fontawesome.com/license/free">Font Awesome License</a>
  <a href="https://github.com/brianvoe/slim-select">Slim Select</a>
</div>
<div class="footerlinks">
  <a href="https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/">Community Dragon</a>
</div>
</footer>
<script src="js/active-tab.js"></script>
<script src="js/chat.js"></script>
</body>

</html>
