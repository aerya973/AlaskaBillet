<?php

//CONNEXION
try {
  $bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8', 'root', 'Coucou les Amis Dev!695.');
} catch(Exception $e){
  die('Erreur :'.$e->getMessage());
}



//AJOUTER UN UTILISATEUR & TEST ERREUR
/*$requete = $bdd->prepare('INSERT INTO udemy(prenom, nom, serie_preferee) VALUES("Jack","Black", "Fargo")') or die(print_r($bdd->errorInfo()));*/

// MODIFIER UN UTILISATEUR
/*$requetes = $bdd->prepare('UPDATE udemy SET serie_preferee="Crazy ex Girlfriend" WHERE prenom="Jack"');*/

//SUPPRIMER UTILISATEUR
/*$requete = $bdd->prepare('DELETE FROM udemy where prenom="Jack"');*/

//JOINTURE ENTRE PLUSIEURS TABLES
/*$requete = $bdd->prepare('INSERT INTO jobs(id_user, metier) VALUES(3, "Boulanger")');*/

//LIRE LES INFOS
/*$requete = $bdd->prepare('SELECT prenom, nom, serie_preferee, metier
                        FROM udemy, jobs
                        WHERE udemy.id = jobs.id_user');*/

//JOINTURE INTERNE
// WHERE:- clair
//JOIN: +clair
  /*$requete = $bdd->prepare('SELECT prenom, nom, serie_preferee, metier
                          FROM udemy AS u
                          INNER JOIN jobs AS j
                          ON u.id = j.id_user');*/

//JOINTURE EXTERNE
$prenom = 'Julien';
$nom = "Pierre";
$requete = $bdd->prepare('SELECT prenom, nom, serie_preferee, metier
                        FROM udemy AS u
                        LEFT JOIN jobs AS j
                        /*Affiche toute la table de gauche*/
                        /*RIGHT JOIN jobs AS j
                        Affiche toute la table de droite*/
                        ON u.id = j.id_user
                        WHERE prenom = ? || nom = ?');
$requete->execute(array($prenom, $nom));

echo '<table border>
        <tr>
          <th scope="col">Pseudo</th>
          <th scope="col">Nom</th>
          <th scope="col">Serie Preferee</th>
          <th scope="col">Mot de passe</th>
        </tr>';

//TANT QU'IL Y A UNE NOUVELLE ENTREE
while($donnees = $requete->fetch()){
  echo'<tr>
        <td>'.$donnees['prenom'].'</td>
        <td>'.$donnees['nom'].'</td>
        <td>'.$donnees['serie_preferee'].'</td>
        <td>'.sha1($donnees['metier']).'4o6r</td>
      </tr>';
  //ECRIVAIN
  //SHA1 = MDP CRYPTE (conseille)
  //MD5 = Dictionnaire existant pas assez securise
  }
  echo '</table>';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
    </head>
    <body>

    </body>

</html>
