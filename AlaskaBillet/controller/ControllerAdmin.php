<?php
session_start();
require_once('controller/ControllerBase.php');

//Faire lien vers controllerarticle
class ControllerAdmin extends ControllerBase
{
  private $_admin;


  public function __construct()
  {
    $this->Loadconfig();
  }

  public function Admin(){
    $this->_view = new View('Admin');
    $this->_view->generate(array());
  }

  public function Authentification($param)
  {
    $this->_adminManager = new AdminManager;
    $admin = $this->Login();
    return $admin;
  }

  public function Login()
  {
    if ((!empty($_POST['user_name'])) && (!empty($_POST['user_pass'])))
    {
      $user = $_POST['user_name'];
      $pass = $_POST['user_pass'];
      $admin = $this->_adminManager->isAdmin($user, $pass);
      var_dump($admin);
      if ($admin != false)
      {
        $_SESSION['user'] = $admin;
        header('location: '.$this->_config->rootPath.'Admin/ShowArticles');
      }
      else
      {
        echo "Not authorized";
      }
    }
    else
    {
      echo 'Attention champ vide';
    }
  }

  public function ShowArticles(){
  if($this->verifyAdmin())
    {
      $this->_articleManager = new ArticleManager;
      $listeArticle = $this->_articleManager->getAll();
      $this->_view = new View('AdminOk');
      $this->_view->generate(array('listeArticle' => $listeArticle, 'imgPath' => $this->_config->rootPath.'assets/'));
    } else
    {
      header('location: '.$this->_config->rootPath.'Admin/Admin');
    }
  }

  public function ShowArticle($param)
  {

    if($this->verifyAdmin())
    {
      $this->_articleManager = new ArticleManager;
      $oneArticle = $this->_articleManager->getOne($param['id']);
      $this->_view = new View('Edit');
      $this->_view->generate(array('oneArticle' => $oneArticle, 'imgPath' => $this->_config->rootPath.'assets/'));
    } else
    {
      header('location: '.$this->_config->rootPath.'Admin/Admin');
    }
  }

  public function verifyAdmin()
  {
    return isset($_SESSION['user']) && $_SESSION['user'] instanceof Admin && $_SESSION['user']->getId() != null;
  }
}
