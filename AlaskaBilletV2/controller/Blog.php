<?php
//SHOW HOME PAGE
class Blog
{
  public function showHome()
  {

    $manager = new ArticleManager();
    $articles = $manager->getAll();
    /*** accès au model ***/

    $myView = new View('home');
    $myView->render(array('articles' => $articles));

  }

  public function showContact()
  {
    $myView = new View('contact');
    $myView->render();
  }
}
