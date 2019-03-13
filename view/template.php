<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php require 'include/head.php'?>
  </head>
  <body>
    <header>
      <?php require 'include/header.php'?>
    </header>
    
  <nav role="navigation">
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
    <input type="checkbox" />
    
    <!--
    Some spans to act as a hamburger.
    
    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->
    <div class="burgerIcon">
      <span></span>
      <span></span>
      <span></span>
    </div>
    
    <ul id="menu">
    <a href="<?=HtmlHelper::getAction('Accueil', 'Accueil')?>"><li>Accueil</li></a>
    <a href="<?=HtmlHelper::getAction('Articles', 'Article')?>"><li>Chapitres</li></a>
      <a href="<?=HtmlHelper::getAction('Admin', 'Admin')?>"><li>Admin</li></a>
      <?php
if (isset($_SESSION['user']) && $_SESSION['user'] instanceof Admin && $_SESSION['user']->getId() != null) {?>
      <a href="<?=HtmlHelper::getAction('logOut', 'Admin')?>"><li>Déconnexion

</li>
  <?php }?>
    </ul>
  </div>
</nav>
    <?php if ($alert !== null) {
      $view = new View();
      echo $view->generateFile('view/alert.php', array('alert' => $alert));
    }?>
    <?=$content?>
  </body>
  <footer>
    <?php require 'include/footer.php'?>
  </footer>
  <script src="<?=$config->rootPath;?>/assets/modal.js"></script>
</html>
