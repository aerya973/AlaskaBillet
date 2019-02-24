<?php
class Alert {

  public $text;
  public $alert;

  public function __construct($message, $alert){
    $this->alert = $alert;
    $this->text = $message;
  }
}
