<?php

class HtmlHelper
{
  public static function getAction($action, $controller)
  {
    $config = new Config();
    return $config->rootPath.$controller.'/'.$action;
  }
}
