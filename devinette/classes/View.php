<?php

class View
{
  private $template;

  public function __construct($template)
  {
    $this->template = $template;
  }

  public function render($params = array())
  {
    // foreach($params as $name => $value)
    // {
    //   ${name} = value;
    // }

    extract($params);
    $template = $this->template;
    ob_start();
    include(VIEW.$template.'.php');
    $contentPage = ob_get_clean();
    include_once(VIEW.'_gabarit.php');
  }
}
