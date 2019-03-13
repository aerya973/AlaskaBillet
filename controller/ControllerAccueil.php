<?php

class ControllerAccueil extends ControllerBase
{

    public function __construct()
    {
        $this->Loadconfig();
    }

    public function Accueil()
    {
        $this->_view = new View('Accueil');
        $this->_view->generate(array('imgPath' => $this->_config->imgPath));
    }
}
