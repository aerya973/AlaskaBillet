 <?php
abstract class ModelManager
{
    private static $_bdd;
    protected $_table;
    protected $_obj;
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'blog_usr', 'mon_blog_oc_2019');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // PATTERN SINGLETON
    protected function getBdd()
    {
        if (self::$_bdd == null) {
            self::setBdd();
        }
        return self::$_bdd;
    }

    public function getAll()
    {
        // SELECT ALL FROM ARTICLE RETURN ARRAY OBJECT IF DATA FETCH
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM ' . $this->_table . ' ORDER BY id ASC');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $this->_obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    public function getOne($id)
    {
        $req = $this->getBdd()->prepare('SELECT * FROM ' . $this->_table . ' WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return new $this->_obj($data);
    }
}
