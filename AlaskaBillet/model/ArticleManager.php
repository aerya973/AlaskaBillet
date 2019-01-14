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
    $req = $this->getBdd()->prepare('UPDATE '.$this->_table.' SET title = ?, content =  ?, img = ? WHERE id = ?');
    $req->execute(array($title, $content, $img, $id));

  }

  public function add($title, $content, $date, $img)
  {
    $req = $this->getBdd()->prepare('INSERT INTO '.$this->_table.' (title, content, date, img) VALUES (title = ?, content = ?, date = now(), img = ?)');
    $req->execute(array($title, $content, $date, $img));
  }
}
