<?php
class Model
{
  public function __construct(array $data)
  {
    $this->hydrate();
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
}
