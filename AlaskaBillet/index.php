<?php
// Get file Routeur.php and call method routeReq();
require_once('Framework/Router.php');

global $environnement;
$environnement = 'dev';

$router = new Router();
$router->routeReq();
