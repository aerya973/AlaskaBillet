<?php

class Comment extends Model {
  private $_com_id;
  private $_com_date;
  private $_com_author;
  private $_com_content;
  private $_article_id;

// SETTER
  public function setComId($com_Id)
  {
    $com_Id = (int) $com_Id;
    if($com_Id > 0)
    $this->_com_id = $com_Id;
  }
  public function setComDate($com_date)
  {
    $this->_com_date = $com_date;
  }

  public function setComAuthor($com_author)
  {
    if(is_string($com_author))
    {
      $this->_com_author = $com_author;
    }
  }

  public function setComContent($com_content)
  {
    if(is_string($com_content))
    {
      $this->_com_content = $com_content;
    }
  }

  public function setArticleId($article_id)
  {
    $article_id = (int) $article_id;
    if($article_id > 0)
    $this->_article_id = $article_id;
  }

// GETTER
  public function getComId()
  {
    return $this->_com_id;
  }

  public function getComDate()
  {
    return $this->_com_date;
  }
  public function getComAuthor()
  {
    return $this->_com_author;
  }
  public function getComContent()
  {
    return $this->_com_content;
  }

  public function getArticleId()
  {
    return $this->_article_id;
  }

}
