<?php

class Config
{

  private $file;
  public $rootPath;
  public $userName;
  public $password;

  public function __construct()
  {
    $this->file = $this->getXml();
    $this->readXml();
  }

  public function getXml()
  {
    global $environnement;
    $file = 'config.'.$environnement.'.xml';
    return $file;
  }

  public function readXml()
  {
    $xml = simplexml_load_file($this->file);
    $this->rootPath = (string)$xml->rootPath;
    $this->userName = (string)$xml->userName;
    $this->password = (string)$xml->password;

        //retourne un simplexml_element = Objet
  }
}
