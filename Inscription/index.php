<?php

  require('src/connexionBdd.php');
  if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) &&!empty($_POST['password_confirm'])){

    //VARIBALE
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_confirm = $_POST['password_confirm'];

    //TESTE SI LES DEUX MOTS DE PASSES SONT identiques
    if($password != $pass_confirm){
      header('location: ./?error=1&pass=1');
    }
    //TEST EMAIL
    $req = $db->prepare('SELECT COUNT(*) AS numberEmail FROM users WHERE email = ?');
    $req->execute(array($email));

    while($email_verification = $req->fetch()){
      if($email_verification['numberEmail'] != 0){
        header('location: ./?error=1&email=1');
      }
    }
    //HASH
    $secret =sha1($email).time();
    $secret = sha1($secret).time().time();

    //CRYPTAGE DU password

    $password = "aq2".sha1($password."1254")."25";
    //envoi de la requete
    $req = $db->prepare("INSERT INTO users(pseudo, email, password, creation_date, secret) VALUES(?, ?, ?, ?)");
    $req->execute(array($pseudo, $email, $password, $secret));
    header('location: ./?success=1');

  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription Espace Membre</title>
    <link rel="stylesheet" type="text/css" href="design/default.css"/>
  </head>
  <body>
    <h1>Inscription</h1>
    <p>Bienvenue sur mon site, pour en savoir plus, inscrivez vous. Sinon, <a href="./connexion.php">connectez-vous</a></p>

    <?php
      //AFFICHE UN MESSAGE D'ERREUR SI ERREUR MOT DE PASSE
      if(isset($_GET['error'])){
        if(isset($_GET['pass'])){
          echo '<p id="error"> Les mots de passe ne sont pas identiques. </p>';
        }else if(isset($_GET['email'])){
            echo '<p id="error">Cette adresse email est deja prise </p>';
        }
      } else if(isset($_GET['success'])){
        echo '<p id="success">Inscription bien prise en compte.</p>';
      }
    ?>

    <form method="post" action="index.php">
      <table>
        <tr>
          <td>Pseudo</td>
          <td><input type="text" name="pseudo" placeholder="Pseudo" required/></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email" placeholder="Email" required/></td>
        </tr>
        <tr>
          <td>Mot de Passe</td>
          <td><input type="password" name="password" placeholder="*****" required/></td>
        </tr>
        <tr>
          <td>Confirmer le Mot de Passe</td>
          <td><input type="password" name="password_confirm" placeholder="*****" required/></td>
        </tr>
      </table>
      <button type="submit"> Inscription </button>
    </form>
  </body>
</html>
