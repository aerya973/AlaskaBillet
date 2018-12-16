<?php
require_once('controller/ControllerBase.php');
// "Colle entre la vue et modele"
class ControllerAccueil extends ControllerBase
{
  private $_articleManager;

  public function __construct($url)
  {
  }

  public function Articles(){
    $this->_articleManager = new ArticleManager;
    $articles = $this->_articleManager->getArticles();

    $this->_view = new View('Accueil');
    $this->_view->generate(array('articles' => $articles));
  }

}
