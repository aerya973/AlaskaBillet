<?php

//Definition des fichiers principaux
include_once '_config/config.php';
include_once '_functions/functions.php';
include_once '_classes/Autoloader.php';
Autoloader::register();
include_once '_config/db.php';


//Page courante
if(isset($_GET['page']) AND !empty($_GET['page'])){
  $page = trim(strtolower($_GET['page']));
}else{
  $page = 'home';
}

$_SESSION['lang'] = getUserLanguage();


//contient toutes les pages
$allPages = scandir('controllers/');


// var_dump($allPages); Affiche les infos d'une variable

//Verification de l'existence de la page
if (in_array($page.'_controller.php', $allPages)) {
  $lang = getPageLanguage($_SESSION['lang'], ['header', $page, 'footer']);
  // debug($lang);
  //Inclusion de la page
  include_once 'models/'.$page.'_model.php';
  include_once 'controllers/'.$page.'_controller.php';
  include_once 'views/'.$page.'_view.php';

} else {
  //Retour d'une erreur
  echo 'Erreur 404';

}
