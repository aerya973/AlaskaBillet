<?php

class Authors {
  private $id;
  private $firstname;
  private $lastname;

  function __construct($id){}

  static function getAuthorsData(){
    global $db;

    $id = str_secur($id);
    $reqAuthors = $db->prepare('SELECT * FROM authors WHERE id = ?');
    $reqAuthors->execute([$id]);
    $data = $reqAuthors->fetch();

    $this->id= $id;
    $this->firstname= $data['firstname'];
    $this->lastname= $data['lastname'];

    return getDataArticles();
  }

  static function getAllAuthors(){
    global $db;
    $reqAuthors = $db->prepare('SELECT * FROM authors');
    $reqAuthors->execute([]);
    return $reqAuthors->fetchAll();
  }

}
