<?php
abstract class ModelManager
{
  private static $_bdd;
  private static function setBdd()
  {
    self::$_bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8','root','Coucou les Amis Dev!695.');
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  protected function getBdd()
  {
    if(self::$_bdd == null)
    {
    self::setBdd();
    return self::$_bdd;
    }
  }

  protected function getAll($table, $obj)
  {
    $var = [];
    $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' ORDER BY id DESC');
    $req-> execute();
    while($data = $req->fetch(PDO::FETCH_ASSOC))
    {
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }
}
