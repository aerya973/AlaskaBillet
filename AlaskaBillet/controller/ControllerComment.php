<?php
require_once('controller/ControllerBase.php');

// "Colle entre la vue et modele"
class ControllerComment extends ControllerBase {

  public $_commentManager;

  public function __construct()
  {
    $this->Loadconfig();
  }

  public function addComment($param){
    if(isset($param['CommentSubmit'])){
      if(!empty($param['author']) && (!empty($param['content'])))
      {
        $articleId = $param['articleId'];
        $author = $param['author'];
        $content = $param['content'];
        $this->_commentManager = new CommentManager();

        if($this->_commentManager->add($author, $content, $articleId)){
          header('Location: '.$this->_config->rootPath.'index.php?url=Article/Articles');
          // $this->Alert('Les articles ont bien ete charges', 'success');
        } else {
          throw new ErrorMsg("Une erreur est survenue lors de l'envoi du commentaire.");
        }
      }
      else
      {
        throw new ErrorMsg("Veuillez remplir les tous les champs");
      }
    }
  }
}
