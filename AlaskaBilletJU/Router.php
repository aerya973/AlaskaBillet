<?php
require_once('view/View.php');
class Router
{
  private $_ctrl;
  private $_view;

  public function routeReq()
  {
    try
    {
      //CHARGEMENT AUTOMATIQUE DES CLASSES
      spl_autoload_register(function($class){
        require_once('model/'.$class.'.php');
      });

      $url= '';
      //CONTROLLER INCLUT SELON L'ACTION DE L'UTILISATEUR
      if(isset($_GET['url']))
      {
        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
        $controller = ucfirst(mb_strtolower($url[0]));
        $action = ucfirst(mb_strtolower($url[1]));
        $controllerClass = "Controller".$controller;
        $controllerFile = 'controller/' . $controllerClass.".php";
        if(file_exists($controllerFile))
        {
          require_once($controllerFile);
          $this->_ctrl = new $controllerClass($url);

          if(method_exists($this->_ctrl, $action)){
            $this->_ctrl->$action();
          } else {
            throw new Exception('Action introuvable');
          }
        } else {
          throw new Exception('Page Introuvable');
        }
      }
      else
      {
        require_once('controller/ControllerAccueil.php');
        $this->_ctrl = new ControllerAccueil($url);
      }
    }
    catch(Exception $e)
    {
      $errorMsg = $e->getMessage();
      $this->_view = new View('Error');
      $this->_view->generate(array('errorMsg'=> $errorMsg));

    }
  }
}
