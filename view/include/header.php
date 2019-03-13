<a href="#" class="header__icon" id="header__icon"></a>
<ul>
  <li><a href="<?=HtmlHelper::getAction('Accueil', 'Accueil')?>">Accueil</a></li>
  <li><a href="<?=HtmlHelper::getAction('Articles', 'Article')?>">Chapitres</a></li>
  <li><a href="<?=HtmlHelper::getAction('Admin', 'Admin')?>">Admin</a></li>

  

  <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] instanceof Admin && $_SESSION['user']->getId() != null) {?>
    <div class='logout'>
      <a href="<?=HtmlHelper::getAction('logOut', 'Admin')?>">Déconnexion
        <img src="<?=$imgPath?>powerOffIcon.png" alt="logout"/>
      </a>
    </div>
  <?php }?>

</ul>



