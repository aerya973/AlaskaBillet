<?php
require_once 'Framework/Config.php';
require_once 'Framework/Alert.php';

class ControllerBase
{
    protected $_config;
    public $_alert;

    public function __construct()
    {
        $this->_alert = null;
    }

    public function Loadconfig()
    {
        $this->_config = new Config();
    }

    public function Alert($message, $alert)
    {
        $this->_alert = new Alert($message, $alert);
    }

    public function verifyAdmin()
    {
        return isset($_SESSION['user']) && $_SESSION['user'] instanceof Admin && $_SESSION['user']->getId() != null;
    }
}
