<?php

class ArticleManager extends ModelManager
{
  public function getArticles()
  {
    return $this->getAll('articles', 'Article');
  }

  public function createArticle()
  {

  }

  public function editArticle()
  {

  }

  public function deleteArticle()
  {

  }
}
