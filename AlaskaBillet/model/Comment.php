<?php

class Comment extends Model {
  public $_id;
  public $_date;
  public $_author;
  public $_content;
  public $_articleId;

// SETTER
  public function setId($_id)
  {
    $_id = (int) $_id;
    if($_id > 0)
    $this->_id = $_id;
  }
  public function setDate($_date)
  {
    $this->_date = $_date;
  }

  public function setAuthor($_author)
  {
    if(is_string($_author))
    {
      $this->_author = $_author;
    }
  }

  public function setContent($_content)
  {
    if(is_string($_content))
    {
      $this->_content = $_content;
    }
  }

  public function setArticleId($_articleId)
  {
    $_articleId = (int) $_articleId;
    if($_articleId > 0)
    $this->_articleId = $_articleId;

  }

// GETTER
  public function getId()
  {
    return $this->_id;
  }

  public function getDate()
  {
    return $this->_date;
  }
  public function getAuthor()
  {
    return $this->_author;
  }
  public function getContent()
  {
    return $this->_content;
  }

  public function getArticleId()
  {
    return $this->_articleId;
  }

}
