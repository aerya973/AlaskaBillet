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
//AUTENTIFICATION/////////////////////////////////////////////////
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

//CRUD GESTION /////////////////////////////////////////////////

//ADMINISTRATION PAGE
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

// GET ONE POST
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

// CONTROL FORM AND REQUEST EDIT
  public function ShowEdit($param)
  {
    if($this->verifyAdmin())
    {
      if(isset($param['editSubmit'])) //$param[''] plutot que POST
      {
        if(isset($param['title'], $param['content'], $param['img']))
        {
          $id = $param['id'];
          $title = $param['title'];
          $content = $param['content'];
          $image = $param['img'];
          $this->_articleManager = new ArticleManager;
          if($this->_articleManager->edit($param['id'], $title, $content, $image))
          {
            echo "Mise a jour effectuee";
          } else
          {
            echo "erreur";
          }
        }
      }
      $this->ShowArticles();
    } else
    {
      header('location: '.$this->_config->rootPath.'Admin/Admin');
    }
  }

  public function ShowAdd()
  {
    if($this->verifyAdmin())
    {
    $this->_view = new View('Add');
    $this->_view->generate(array());
    } else
    {
      header('location: '.$this->_config->rootPath.'Admin/Admin');
    }
  }

  public function AddArticle($param)
  {

    if($this->verifyAdmin())
    {
      $target_dir = "assets/";
      $target_file = $target_dir . basename($_FILES["img"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      echo "[DEBUT BLOC]";
      if(isset($param['addSubmit']))
      {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
          echo "Le fichier est une image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "Le fichier n'est pas une image";
          $uploadOk = 0;
        }

        echo "[AVANT CONDITION]";

        var_dump($param);
        //PAS param['img'];

        if(isset($param['title'], $param['content']))
        {
          echo "[DEBUT CONDITION]";

          $title = $param['title'];
          $content = $param['content'];
          $image = $_FILES["img"]["name"];
          $this->_articleManager = new ArticleManager;

          if($this->_articleManager->add($title, $content, $image))
          {
            echo "[MILIEU CONDITION]";
            echo "Mise a jour effectuee";
          } else
          {
            echo "erreur";
          }
          echo "[FIN CONDITION]";

        }
        echo "[APRES CONDITION]";
      }
      echo "[FIN BLOC]";

      if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file))
        {
          // print_r($_FILES);
          echo "Votre fichier ". basename( $_FILES["img"]["name"]). " a été téléchargé.";
        } else
        {
          echo " Désolé, une erreur s'est produite lors de l'envoi de votre fichier.";
        }
      }
      $this->ShowArticles();
    } else
    {
      header('location: '.$this->_config->rootPath.'Admin/Admin');
    }
  }


  public function deleteArticle($param)
  {
    if($this->verifyAdmin())
    {
      if(isset($param['deletePost']))
      {
          $this->_articleManager = new ArticleManager;
          if($this->_articleManager->delete($param['id']))
          {
            echo "Mise a jour effectuee";
          } else
          {
            echo "erreur";
          }
        }
        $this->ShowArticles();
    } else
    {
      header('location: '.$this->_config->rootPath.'Admin/Admin');
    }
  }


  public function verifyAdmin()
  {
    return isset($_SESSION['user']) && $_SESSION['user'] instanceof Admin && $_SESSION['user']->getId() != null;
  }


  public function errorProd()
  {
    if ($this->_config->environnement == "prod")
    {
      $this->_view = new View('Error');
      $this->_view->generate(array());
    }
  }
}
