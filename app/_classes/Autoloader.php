<?php
// Ajout de l'autoLoader
class Autoloader{
  static function register(){
    spl_autoload_register(function($class){
    include_once'_classes/'.$class.'.php';
    });
  }
}
