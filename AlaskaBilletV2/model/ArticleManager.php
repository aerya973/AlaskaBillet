<?php
class ArticleManager extends ModelManager
{

  public function __construct()
  {
    $this->_table = 'articles';
    $this->_obj = 'Article';
  }

  public function editArticle()
  {
    return $this->edit();
  }

  //ADD POST return $this->add();


  //DELETE POST return $this->delete();
}
