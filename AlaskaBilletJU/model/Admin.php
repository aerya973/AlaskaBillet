<?php

class Admin extends Model
{
  private $_id;
  private $user_name;
  private $user_pass;

  public function __construct()
  {
  }
  public function checkAdmin($user_name , $user_pass)
  {
    // $req =  $this->getBdd()->prepare('SELECT * FROM login_admin WHERE user_name = ? AND user_pass = ?');

    // $req->bindValue(':user_name',$_POST['user_name'], PDO::PARAM_STR);
    // $req->execute();
    // $data=$req->fetch();
    //
    // $req->execute([
    //   'user_name' => $user_name,
    //   'user_pass' => $user_pass
    // ]);
    // $user = $req->fetch();

  }
}
