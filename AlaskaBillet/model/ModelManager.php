 <?php
abstract class ModelManager
{
  private static $_bdd;
  protected $_table;
  protected $_obj;
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
    }
    return self::$_bdd;
  }

  public function getAll()
  {
    $var = [];
    $req = $this->getBdd()->prepare('SELECT * FROM '.$this->_table.' ORDER BY id ASC');
    $req-> execute();

    while($data = $req->fetch(PDO::FETCH_ASSOC))
    {
      $var[] = new $this->_obj($data);
    }
    return $var;
    $req->closeCursor();
  }

  public function getOne($id)
  {
    $req = $this->getBdd()->prepare('SELECT * FROM '.$this->_table.' WHERE id = ?');
    $req->execute(array($id));
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return new $this->_obj($data);
  }
}
