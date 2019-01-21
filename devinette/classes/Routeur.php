<?php
// CREATE ROUTES AND FIND CONTROLLER
class Routeur
{
  private $request;
  private $routes = [
                        "home.html" => ["controller" => 'Home', "method" => 'showHome'],
                        "contact.html" => ["controller" => 'Home', "method" => 'showContact'],
                        "created-devinette.html" => ["controller" => 'Home', "method" => 'editDev']
                    ];

  public function __construct($request)
  {
    $this->request = $request;
  }

  public function renderController()
  {
    $request = $this->request;

    if(key_exists($request, $this->routes))
    {
      $controller = $this->routes[$request]['controller'];
      $method = $this->routes[$request]['method'];

      $currentController = new $controller();
      $currentController->$method();
    } else
    {
      echo '404';
    }
  }
}
