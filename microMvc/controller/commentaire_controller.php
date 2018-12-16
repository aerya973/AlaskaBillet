<?php
//APPELLE MODEL ENVOIE DONNEEES A LA VU£, TRAITEMENT FONCTIONNEL
class CommentaireController {

  public function afficher(){
    $commentaire = CommentaireModel::getCommentaireById(1);
    include "view/commentaire_view.php";

  }
}
