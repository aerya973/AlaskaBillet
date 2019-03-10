<?php

class AdminManager extends ModelManager
{
    public function __construct()
    {
        $this->_table = 'login_admin';
        $this->_obj = 'Admin';
    }
    // IF REQ FETCH RETURN OBJECT ADMIN OTHERWHISE FALSE 
    public function isAdmin($user, $pass)
    {
        $req = $this->getBdd()->prepare('SELECT id, user_name FROM ' . $this->_table . ' WHERE user_name = ? AND user_pass = ?');
        $req->execute(array($user, $pass));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if ($res != false) {
            return new $this->_obj($res);
        } else {
            return false;
        }
    }
}
