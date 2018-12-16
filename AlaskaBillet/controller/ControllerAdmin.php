<?php
require_once('controller/ControllerBase.php');

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

      if ($admin != false)
      {
        $this->IsLogged();
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

  public function IsLogged(){
    // $this->_articleManager = new ArticleManager;
    // $this->ArticleManager->getArticles();
    $this->_view = new View('AdminOk');
    $this->_view->generate(array());
  }
}
