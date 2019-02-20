<?php
require_once('view/View.php');
require_once('Framework/Config.php');
require_once('Framework/Alert.php');
// Modele pour les controllers
class ControllerBase {
  protected $_view;
  protected $_config;
  public $_alert;
  public $_comment;

  public function __construct()
  {
    $this->_alert = null;
  }

  public function Loadconfig()
  {
    $this->_config = new Config();
  }

  public function Alert($message, $alert){
    $this->_alert = new Alert($message, $alert);
  }

}
