<?php
//ROUTING
include "controller/commentaire_controller.php";
include "model/commentaire_model.php";
$reqUrl = $_SERVER['REQUEST_URI'];

switch ($reqUrl) {
  case '/microMvc/commentaire/afficher/':
    $newComment = new CommentaireController();
    $newComment->afficher();
    break;

  default:
    // code...
    break;
}
