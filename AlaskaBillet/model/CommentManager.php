<?php

class CommentManager extends ModelManager {

  public function __construct(){
    $this->_table = 'comments';
    $this->_obj = 'Comment';
  }

  public function getAllComments(){
    $tableau = [];
    $req = $this->getBdd()->prepare('SELECT id, date, author, content, articleId FROM '.$this->_table);
    $req->execute(array());

    while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
      $tableau[] = new $this->_obj($donnees);
    }
    return $tableau;

    $req->closeCursor();
  }

  // public function getOneComment($id)
  // {
  //   $req = $this->getBdd()->prepare('SELECT * FROM '.$this->_table.' WHERE id = ?');
  //   $req -> execute(array($id));
  //   $data = $req->fetch(PDO::FETCH_ASSOC);
  //
  // }

  public function add($author, $content, $articleId){
    $req = $this->getBdd()->prepare('INSERT INTO '.$this->_table.' (author, content, articleId, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($author, $content, $articleId));
  }
}
