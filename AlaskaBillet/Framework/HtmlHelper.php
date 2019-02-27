<?php
class HtmlHelper
{

  public static function getAction($action, $controller)
  {
    $config = new Config();
    // var_dump(URL);
    return $config->rootPath.$controller.'/'.$action;
  }

  public static function getActionId($action, $controller, $id)
  {
    $config = new Config();
    return $config->rootPath.$controller.'/'.$action.'/'.$id;
  }

}
