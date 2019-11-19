<?php

class Config
{

    private $file;
    public $rootPath;
    private $userName;
    private $password;
    public $assetsPath;

    public function __construct()
    {
        $this->file = $this->getXml();
        $this->readXml();
    }

    public function getXml()
    {
        global $environnement;
        $file = 'config.' . $environnement . '.xml';
        return $file;
    }

    public function readXml()
    {
        //CONVERTS XML FILE TO AN OBJECT
        $xml = simplexml_load_file($this->file);
        $this->rootPath = (string) $xml->rootPath;
        $this->userName = (string) $xml->userName;
        $this->password = (string) $xml->password;
        $this->assetsPath = (string) $xml->assetsPath;
        $this->environnement = (string) $xml->environnement;
    }
}
