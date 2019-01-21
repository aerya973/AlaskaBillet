<?php

class Admin {

  public function showAdmin()
  {
    // $myView = new View('admin');
  }

  public function Authentification()
  {
    $admin = $manager->Login();
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
