<ul>
  <li><a href="<?= HtmlHelper::getAction('Articles', 'Article') ?>">Accueil</a></li>
  <li><a href="<?= HtmlHelper::getAction('Admin', 'Admin') ?>">Admin</a></li>
  
  <?php
  if (isset($_SESSION['user'])) {?>
    <div class='logout'>
      <a href="<?= HtmlHelper::getAction('logOut', 'Admin') ?>">Deconnexion
        <img src="assets/powerOffIcon.png" alt="logout">
      </a>
    </div>
  <?php } ?>

</ul>
<h1><a href="<?= HtmlHelper::getAction('Articles', 'Article') ?>">Billet simple pour l'Alaska</a></h1>
