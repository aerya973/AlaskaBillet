<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" >
    <link rel="stylesheet" href="<?= ASSETS; ?>style.css"/>
  </head>
  <body>
    <header>
      <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Chapitres</a></li>
        <li><a href="#">Auteur</a></li>
        <li><a href="#">Admin</a></li>
      </ul>
      <h1><a href="#">Billet simple pour l'Alaska</a></h1>
      <p>Bienvenue sur mon blog</p>
    </header>

    <?= $contentPage ?>

    <footer>
      Creation par...
    </footer>

  </body>
</html>
