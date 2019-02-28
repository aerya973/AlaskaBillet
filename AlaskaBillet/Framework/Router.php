<?php
require_once('view/View.php');
require_once('Exception.php');


class Router
{
  private $_ctrl;
  private $_view;
  private $_parameter;
  private $_error;

  public function routeReq(){
    try{

      //CHARGEMENT AUTOMATIQUE DES CLASSES
      spl_autoload_register(function($class){
        if(file_exists('model/'.$class.'.php')){
          require_once('model/'.$class.'.php');
        } else if(file_exists($class.'.php')){
          require_once($class.'.php');
        } else if (file_exists('controller/' . $class . '.php')){
          require_once('controller/'. $class.'.php');
        }
      });

      $this->_error = new ControllerError();

      $url= '';
      global $currentController;
      $currentController = $this->_ctrl;
      //CONTROLLER INCLUT SELON L'ACTION DE L'UTILISATEUR
      if(isset($_GET['url'])){

        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
        $controller = ucfirst(mb_strtolower($url[0]));
        $action = ucfirst(mb_strtolower($url[1]));
        $controllerClass = "Controller".$controller;
        $controllerFile = 'controller/' . $controllerClass.".php";
        if(file_exists($controllerFile)){
          $this->_ctrl = new $controllerClass();
          $currentController = $this->_ctrl;

          if(method_exists($this->_ctrl, $action)){
            $this->getHttpParameter();
            if(count($this->_parameter) > 0){
              $this->_ctrl->$action($this->_parameter);
            } else {
              $this->_ctrl->$action();
            }
          } else {
            $this->_error->showError(new Exception('Action introuvable'));
          }
        } else {
          $this->_error->showError(new Exception('Page introuvable'));  
        }
      } else {
        $this->_ctrl = new ControllerAccueil();
        $this->_ctrl->Accueil();
      }
    }
 //Recuperer la config Condition dev/prod
 catch(ErrorMsg $e)
 {
   $this->_error->showError($e);
 }
}

public function getHttpParameter(){
 $this->_parameter = array_merge($_POST, $_GET);
}
}