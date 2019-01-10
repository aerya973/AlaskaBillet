<?php
class ArticleManager extends ModelManager
{

  public function __construct()
  {
    $this->_table = 'articles';
    $this->_obj = 'Article';
  }

  public function edit($id, $title, $content, $img)
  {
    $req = $this->getBdd()->prepare('UPDATE '.$this->_table.' SET title = ? , content =  ?, img = ? WHERE id = ?');
    $req->execute(array($title, $content, $img, $id));
    var_dump($req);

  }
  //
  // public function editArticle()
  // {
  //   return $this->edit();
  // }

  //ADD POST return $this->add();


  //DELETE POST return $this->delete();
}
