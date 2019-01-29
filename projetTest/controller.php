<?php

include_once('model.php');
class Controller {

  public function index(){
    $isAdmin = true;
    if($isAdmin){
      $modele = new Calculette();
      $resultat = $modele->division(10,0);
      include_once('view.php');
    }else{
      throw new AdminException("Vous n'etes pas connecte");
    }
  }
}
