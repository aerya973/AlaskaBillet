<?php
require_once('Framework/HtmlHelper.php');
require_once('Framework/Config.php');
class View
{
  private $_file;
  private $_t;
  protected $_config;

  public function __construct($action = null)
  {
    $this->_file = 'view/view'.$action.'.php';
  }

  // GENERE ET AFFICHE LA VUE
  public function generate($data)
  {
    //PARTIE SPECIFIQUE DE LA VUE
    $content = $this->generateFile($this->_file, $data);
    //TEMPLATE
    global $currentController;
    $view = $this->generateFile('view/template.php', array('_t' => $this->_t, 'content' => $content, 'alert' => $currentController->_alert));
    echo $view;
  }
  //GENERE UN FICHIER VUE, RENVOI RESULTAT PRODUIT
  public function generateFile($file, $data)
  {
    if(file_exists($file))
    {
      extract($data);
      ob_start();
      $config = new Config();
      //INCLUT LE FICHIER VUE
      require $file;
      return ob_get_clean();
    }
    else
      throw new ErrorMsg('Fichier '.$file.' introuvable');
  }
}
