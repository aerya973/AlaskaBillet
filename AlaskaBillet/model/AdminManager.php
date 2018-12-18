<?php

class AdminManager extends ModelManager
{
  public function isAdmin($user, $pass)
  {
    $table = 'login_admin';

    $req = $this->getBdd()->prepare('SELECT id, user_name FROM '.$table. ' WHERE user_name = ? AND user_pass = ?');
    $req->execute(array($user, $pass));
    $res = $req->fetch(PDO::FETCH_ASSOC);

    if($res != false)
    {
      session_start();
      $_SESSION['user'] = 'admin';
      return new Admin($res);
    }
    else
    {
      return false;
    }
  }
}
