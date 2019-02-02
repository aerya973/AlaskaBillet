<?php

class ControllerError extends ControllerBase {

  public function __construct()
  {
    $this->Loadconfig();
  }

  public function showError(Exception $e){
    $errorMsg = $e->getMessage();
    $this->_view = new View('Error');
    $this->_view->generate(array('errorMsg'=> $errorMsg));
  }
}
