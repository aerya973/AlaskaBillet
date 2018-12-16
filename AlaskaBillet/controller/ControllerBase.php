<?php
require_once('view/View.php');
require_once('Config.php');
// Modele pour les controllers
class ControllerBase {
  protected $_view;
  protected $_config;

  public function Loadconfig()
  {
    $this->_config = new Config();
  }
}
