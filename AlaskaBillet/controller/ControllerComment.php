<?php
require_once('controller/ControllerBase.php');

// "Colle entre la vue et modele"
class ControllerComment extends ControllerBase {

  private $_commentManager;

  public function __construct()
  {
    $this->Loadconfig();
  }

  public function addComment($param){
      echo "DEBUT";
      var_dump($param);
    if(isset($param['CommentSubmit'])){
      echo "SIL Y A UN BOUTON SUBMIT";
      if(isset($param['com_author'], $param['com_content']))
      {
          echo "SIL Y A UN AUTEUR ET UN COMMENTAIRE";
      $id = $param['id'];
      $author = $param['com_author'];
      $content = $param['com_content'];

      $this->_commentManager = new CommentManager;
      echo 'ON FAIT LA REQUETE';
      if($this->_commentManager->add($id, $author, $content)){
        echo "Mise a jour effectuee";
        echo "REQUETE OK";
      } else {
        echo "erreur";
      }
      }
    }
  }
}
