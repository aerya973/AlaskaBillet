<?php
class ArticleManager extends ModelManager
{
  public function getArticles()
  {
    return $this->getAll('articles', 'Article');
  }

  //ADD POST return $this->add();

  //EDIT POST return $this->edit();

  //DELETE POST return $this->delete();
}
