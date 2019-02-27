<?php

class CommentManager extends ModelManager {

  public function __construct(){
    $this->_table = 'comments';
    $this->_obj = 'Comment';
  }


  public function getAllComments(){
    $tableau = [];
    $req = $this->getBdd()->prepare('SELECT id, date, author, content, articleId, signalement FROM '.$this->_table.' ORDER BY signalement DESC');
    $req->execute(array());

    while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
      $tableau[] = new $this->_obj($donnees);
    }
    return $tableau;

    $req->closeCursor();
  }


  public function add($author, $content, $articleId){
    $req = $this->getBdd()->prepare('INSERT INTO '.$this->_table.' (author, content, articleId, date) VALUES (?, ?, ?, NOW())');
    return $req->execute(array($author, $content, $articleId));
  }


  public function delete($id)
  {
    $req = $this->getBdd()->prepare('DELETE FROM '.$this->_table.' WHERE id = ?');
    return $req->execute(array($id));
  }


  public function update($nbSignal, $id){
     $req = $this->getBdd()->prepare('UPDATE '.$this->_table.' SET signalement = ? WHERE id = ?');
     return $req->execute(array($nbSignal, $id));
  }

}
