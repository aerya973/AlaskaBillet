<?php
// RECUPERE LES DONNEES DE FACON SECURISEE
class Article
{
  private $_id;
  private $_title;
  private $_content;
  private $_date;
  private $_img;
//CONSTRUCTEUR
  public function __construct(array $data)
  {
    $this->hydrate($data);
  }
  //HYDRATATION
  public function hydrate(array $data)
  {
    //PARCOURS LA DATA AVEC FOREACH
      foreach($data as $key => $value)
      {

        $method = 'set'.ucfirst($key);
        if(method_exists($this, $method))
        {
          $this->$method($value);
          //Variable dynamique
        }
      }
  }

  //SETTER

  public function setId($id)
  {
    $id = (int) $id;
    if($id > 0)
    $this->_id = $id;
  }
  public function setTitle($title)
  {
    if(is_string($title))
    $this->_title = $title;
  }

  public function setContent($content)
  {
    if(is_string($content))
    {
      $this->_content = $content;
    }
  }

  public function setDate($date)
  {
    $this->_date = $date;
  }

  public function setImg($img)
  {
    if(file_exists("assets/" . $img))
    {
      $this->_img = $img;
    }
  }

  //GETTER
  public function id()
  {
    return $this->_id;
  }

  public function title()
  {
    return $this->_title;
  }
  public function content()
  {
    return $this->_content;
  }
  public function date()
  {
    return $this->_date;
  }

  public function img()
  {
    return $this->_img;
  }

}
