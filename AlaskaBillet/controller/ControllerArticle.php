<?php
session_start();
require_once 'controller/ControllerBase.php';

class ControllerArticle extends ControllerBase
{
    private $_articleManager;
    public $_commentManager;

    public function __construct()
    {
        $this->Loadconfig();
    }

    public function Articles()
    {
        $this->_articleManager = new ArticleManager;
        $articles = $this->_articleManager->getAll();
        $this->_commentManager = new CommentManager();
        $comments = $this->_commentManager->getAllComments();
        $this->_view = new View('Article');
        // $this->Alert('Les articles ont bien ete charges', 'success');
        $this->_view->generate(array('articles' => $articles, 'comments' => $comments, 'imgPath' => $this->_config->rootPath . 'assets/'));
    }

}
