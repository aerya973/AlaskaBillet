<?php
require_once('controller/ControllerBase.php');
session_start();

class ControllerAdmin extends ControllerBase
{
  private $_admin;

  public function __construct($url)
  {
  }

  public function Admin(){
    $this->_adminManager = new AdminManager;
    $admin = $this->_adminManager->getAdmin();
    $this->_view = new View('Admin');
    $this->_view->generate(array());
  }

  public function verifyAdmin(){
    $message='';
    if (empty($_POST['user_name']) || empty($_POST['user_pass']) ) //Oublie d'un champ
    {
      $message = '<p>une erreur s\'est produite pendant votre identification.
      Vous devez remplir tous les champs</p>
      <p>Cliquez <a href="./verifyAdmin">ici</a> pour revenir</p>';
    }
    else
    {
      if ($data['user_pass'] == md5($_POST['user_pass'])) // Acces OK !
      {
        $_SESSION['user_name'] = $data['user_name'];
      }
      else
      {
        $message = '<p>Une erreur s\'est produite
        pendant votre identification.<br /> Le mot de passe ou le pseudo
        entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a>
        pour revenir à la page précédente
        <br /><br />Cliquez <a href="./index.php">ici</a>
        pour revenir à la page d accueil</p>';
      }
      $req->CloseCursor();
    }
    echo $message.'</div></body></html>';
  }

  public function isAdmin()
  {
    if ($_SESSION != null)
    {
      if ($_SESSION['isAdmin'] == true) {
        return true;
      }
      else {
        echo "vous nest pas admin";
        return false;
      }
    }
    else
    {
      echo "Vous n'etes pas connecte";// code...
      return false;
    }
  }

  public function authentification()
  {
    echo 'authentification()';
  }

}
