<?php

require_once('Framework/Router.php');

global $environnement;
$environnement = 'dev';

$router = new Router();
$router->routeReq();
