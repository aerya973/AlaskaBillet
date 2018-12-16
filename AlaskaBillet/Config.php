<?php

class Config
{

  private $file;
  public $rootPath;

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

        //retourne un simplexml_element = Objet
  }
}
