<?php
//SHOW HOME PAGE
class Home
{
  public function showHome()
  {

    $manager = new DevinetteManager();
    $devinettes = $manager->findAll();
    /*** accès au model ***/

    $myView = new View('home');
    $myView->render(array('devinette' => $devinettes));

  }

  public function showContact()
  {
    $myView = new View('contact');
    $myView->render();
  }

  public function editDev()
  {
    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $manager = new Devinette();
        $devinette =$manager->find($id);
    } else {
      $devinette = new Devinette();
    }
    $myView = new View('edit');
    $myView->render(array('devinette' => $devinette));
  }
}
