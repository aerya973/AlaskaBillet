<?php
//CREATION COOKIE ET PROTECTION HTTP
  if(!empty($_POST['pseudo'])){
    $pseudo = $_POST['pseudo'];
    setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
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
        if(!empty($_COOKIE['pseudo'])){
          echo'<h2>Bienvenue '.htmlspecialchars($_COOKIE['pseudo']).'</h2>';
        }
      ?>

    </body>
</html>
