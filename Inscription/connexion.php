<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="design/default.css"/>
  </head>
  <body>
    <h1>Connexion</h1>
    <p>Bienvenue sur mon site, si vous n'etes pas inscrit <a href="./">Inscrivez-vous</a></p>
    <form method="post" action="connexion.php">
      <table>
        <tr>
          <td>Email</td>
          <td><input type="amil" name="email" placeholder="Email"/></td>
        </tr>
        <tr>
          <td>Mot de Passe</td>
          <td><input type="password" name="password" placeholder="*****"/></td>
        </tr>
      </table>
      <button type="submit">Connexion</button>
    </form>
  </body>
</html>
