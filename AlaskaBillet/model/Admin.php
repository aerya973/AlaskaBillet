<?php

class Admin extends Model
{
  private $id;
  private $user_name;
  private $user_pass;

  public function setId($id)
  {
    $id = (int) $id;
    if($id > 0)
    $this->id = $id;
  }

  public function setUser_name($user_name)
  {
    if(is_string($user_name))
    {
      $this->user_name = $user_name;
    }
  }

  public function getId()
  {
    return $this->id;
  }
}
