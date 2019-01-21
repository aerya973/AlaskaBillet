<?php
// CREATE ROUTES AND FIND CONTROLLER
class Routeur
{
  private $request;
  private $routes = [
                        "home.html"               => ["controller" => 'Blog', "method" => 'showHome'],
                        "contact.html"            => ["controller" => 'Blog', "method" => 'showContact'],
                    
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
