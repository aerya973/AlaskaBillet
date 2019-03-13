<?php

require_once 'view/View.php';
require_once 'Exception.php';

class Router
{
    private $_ctrl;
    private $_view;
    private $_parameter;
    private $_error;

    public function routeReq()
    {
        try {
            spl_autoload_register(function ($class) {
                if (file_exists('model/' . $class . '.php')) {
                    require_once ('model/' . $class . '.php');
                } else if (file_exists($class . '.php')) {
                    require_once ($class . '.php');
                } else if (file_exists('controller/' . $class . '.php')) {
                    require_once ('controller/' . $class . '.php');
                }
            });

            $this->_error = new ControllerError();
            $this->_ctrlBase = new ControllerBase();
            if (!($this->_ctrlBase->verifyAdmin())){
                session_start();
            }

            $url = '';
            global $currentController;

            if (isset($_GET['url'])) {
                //SPLIT URL INTO SEGMENTS /-> DELIMITER FILTER DELETE ALL EXCEPT LETTER, NUMBER AND SPECIAL CHAR
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                // CONTROLLER IS FIRST PARAMETER
                $controller = ucfirst(mb_strtolower($url[0]));
                // ACTION IS SECOND PARAMETER
                $action = ucfirst(mb_strtolower($url[1]));
                $controllerClass = "Controller" . $controller;
                $controllerFile = 'controller/' . $controllerClass . ".php";
                
                if (file_exists($controllerFile)) {
                    $this->_ctrl = new $controllerClass();
                    $currentController = $this->_ctrl;
                    // IF THERE IS CONTROLLER AND ACTION GET HTTP PARAMETER
                    if (method_exists($this->_ctrl, $action)) {
                        $this->getHttpParameter();
                        // IF $this->_parameter IS GREATER THAN ZERO ACTION GET PARAMETER ELSE NO PARAMETER
                        if (count($this->_parameter) > 0) {
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
                // IF THERE IS NO URL WE GO ON HOMEPAGE
                $this->_ctrl = new ControllerAccueil();
                $currentController = $this->_ctrl;
                $this->_ctrl->Accueil();
            }
        // IF TRY DOESN'T MATCH, SHOW ERROR
        } catch (ErrorMsg $e) {
            $this->_error->showError($e);
        }
    }

    public function getHttpParameter()
    {
        $this->_parameter = array_merge($_POST, $_GET);
    }
}
