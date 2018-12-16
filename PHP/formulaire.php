<?php
//CONNEXION
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8', 'root', 'Coucou les Amis Dev!695.');
  } catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }

//AJOUTE UN NOUVEL UTILISATEUR
  if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['serie'])){

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $serie = $_POST['serie'];

    $requete = $bdd->prepare('INSERT INTO udemy(prenom, nom, serie_preferee) VALUES(?, ?, ?)') or die (print_r($bdd->errorInfo()));
    $requete->execute(array($prenom, $nom, $serie));
    header('location:http://localhost/php/formulaire.php');
  }

//AFFICHE LES INFORMATIONS
  $requete = $bdd->query('SELECT prenom, nom, serie_preferee
                          FROM udemy');

  echo '<table border>
          <tr>
            <th>Pseudo</th>
            <th>Nom</th>
            <th>Serie Preferee</th>
          </tr>';

//TANT QU'IL Y A UNE NOUVELLE ENTREE
  while($donnees = $requete->fetch()){
    echo'<tr>
          <td>'.$donnees['prenom'].'</td>
          <td>'.$donnees['nom'].'</td>
          <td>'.$donnees['serie_preferee'].'</td>
        </tr>';
  }

  $requete->closeCursor();

  echo '</table>';
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
    </head>
    <body>

      <h1>Ajouter un utilisateur</h1>

      <form method="post" action="formulaire.php">
        <tr>
          <td>Prenom</td>
          <td><input type="text" name="prenom"/></td>
        </tr>
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom"/></td>
        </tr>
        <tr>
          <td>Serie preferee</td>
          <td><input type="text" name="serie"/></td>
        </tr>

        <button type="submit"> Ajouter </button>

    </body>
</html>
