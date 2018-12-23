<?php
require_once('controller/ControllerBase.php');

// "Colle entre la vue et modele"
class ControllerArticle extends ControllerBase
{
  private $_articleManager;

  public function __construct($url)
  {
    $this->Loadconfig();
  }

  public function Articles(){
    $this->_articleManager = new ArticleManager;
    $articles = $this->_articleManager->getAll();
    $this->_view = new View('Article');
    $this->_view->generate(array('articles' => $articles , 'imgPath' => $this->_config->rootPath.'assets/'));
  }
}
