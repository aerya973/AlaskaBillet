<?php

class ArticleManager extends ModelManager
{
  static function getArticles()
  {
    return $this->getAll('articles', 'Article');
  }
}
