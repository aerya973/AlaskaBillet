<?php
class CommentaireModel {
  public $text;
  public $date;
  public $auteur;

  public function __construct($text, $date, $auteur){
    $this->text = $text;
    $this->date = $date;
    $this->auteur = $auteur;
  }

  public static function getCommentaireById($id){
    return new CommentaireModel("Coucou", "12/09/2019", "Georges");

  }
}
