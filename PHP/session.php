<?php
//DEBUT DE SESSION
session_start();
//session_destroy();
  if(!empty($_SESSION['pseudo'])){
    $pseudo = $_POST['pseudo'];
    $_SESSION['pseudo'] = $pseudo;
  }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
    </head>
    <body>

      <h1>Entrez votre pseudo</h1>

      <form method="post" action="cookie.php">
        <table>
          <tr>
            <td>Pseudo</td>
            <td><input type="text" name="pseudo"/></td>
          </tr>
        </table>
        <button type="submit"> Ajouter </button>
      </form>

      <?php
        if(!empty($_SESSION['pseudo'])){
          echo'<h2>Bienvenue '.htmlspecialchars($_SESSION['pseudo']).'</h2>';
        }
      ?>

    </body>
</html>
