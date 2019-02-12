<?php

class CommentManager extends ModelManager {


  public function __construct(){
    $this->_table = 'comments';
    $this->_obj = 'Comment';
  }

  public function add($author, $content){
    try{
    $req = $this->getBdd()->prepare('INSERT INTO '.$this->_table.' (com_author, com_content, com_date) VALUES (?, ?, NOW())
          INNER JOIN articles ON comments.id = articles.id');
    $req->execute(array($author, $content));
    }catch(Exception $e){
    echo $e;
    }
  }
}
