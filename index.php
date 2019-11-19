<?php
require_once('Framework/Router.php');

global $environnement;
$environnement = 'prod';


$router = new Router();
$router->routeReq();
