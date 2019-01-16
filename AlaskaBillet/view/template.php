<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php require 'include/head.php' ?>
  </head>
  <body>
    <header>
      <?php require 'include/header.php' ?>
    </header>
    <?= $content ?>
    <footer>
      <?php require 'include/footer.php' ?>
    </footer>
    <script src="<?= $config->rootPath; ?>/assets/modal.js"></script>
  </body>
</html>
