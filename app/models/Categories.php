<?php

class Categories {
  private $id;
  private $name;

  function __construct(){}


  static function getDataCategories($id){
    global $db;

    $id = str_secur($id);
    $reqCategory = $db->fetch('SELECT * FROM categories WHERE id = ?');
    $data = $reqCategory;

    $this->id= $id;
    $this->name= $data['name'];

    return getDataCategories();
  }


  static function getAllCategories(){

    global $db;

    $reqCategories = $db->fetch('SELECT * FROM categories');
    return $reqCategories;
  }

}
