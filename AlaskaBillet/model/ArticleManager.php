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
    if($img == null)
    {
        $req = $this->getBdd()->prepare('UPDATE '.$this->_table.' SET title = ?, content =  ? WHERE id = ?');
        return $req->execute(array($title, $content, $id));
    } else
    {
      $req = $this->getBdd()->prepare('UPDATE '.$this->_table.' SET title = ?, content =  ?, img = ? WHERE id = ?');
      return $req->execute(array($title, $content, $img, $id));
    }
  }

  public function add($title, $content, $img)
  {
    $req = $this->getBdd()->prepare('INSERT INTO '.$this->_table.' (title, content, img, date) VALUES (?, ?, ?, NOW())');
    return $req->execute(array($title, $content, $img));
  }

  public function delete($id)
  {
    $req = $this->getBdd()->prepare('DELETE FROM '.$this->_table.' WHERE id = ?');
    return $req->execute(array($id));
  }
}
