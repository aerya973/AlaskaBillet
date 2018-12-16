<?php
class User {

  private $pseudo;
  private $id;

  function __construct(){

  }

  static function validateUser(){
    if(!empty($_POST) && isset($_POST['submit'])){
      if(isset($_POST['pseudo']) && isset($_POST['password'])){
        if(!empty($_POST['pseudo']) && !empty($_POST['password'])){

          $pseudo = str_secur($_POST['pseudo']);
          $password = str_secur($_POST['password']);
          return reqUser();


        }else{
          $error = "Vous devez remplir tous les champs";
        }
      } else {
      $error = "Une erreurs s'est produite";
      }
    }
  }

  public function reqUser(){

    $req = $db->prepare("INSERT INTO users(pseudo, password, creation_date) VALUES(?, ?, ?)");
    $req->execute(array($pseudo, $password));
  }

  public function authentification($pseudo, $password){
    $req = $db->prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
    $req->execute(array($pseudo, $password));
    $user = $req->fetch(PDO::FETCH_CLASS);

    if($user == null){
      // retourner une erreur
    } else {
      return $user;

    }
  }
}
