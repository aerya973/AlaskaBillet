<?php
class DevinetteManager
{
  private $bdd;

  public function __construct()
  {
    $this->bdd = new PDO("mysql:host=localhost;dbname=devinette;charset=utf8", "root", "Coucou les Amis Dev!695.");
  }

  public function findAll()
  {
    $bdd = $this->bdd;
    $query = "SELECT * FROM devinette";
    $req = $bdd->prepare($query);
    $req->execute();
    while ($row = $req->fetch(PDO::FETCH_ASSOC))
    {
      $devinette = new Devinette();
      $devinette->setId($row['id']);
      $devinette->setName($row['name']);
      $devinette->setQuestion($row['question']);
      $devinette->setAnswer($row['answer']);
      $devinette->setCreatedAt($row['created_at']);
      $devinettes[] = $devinette; // tableau de tableau
    };
    return $devinettes;
  }

  public function find($id)
  {
    $query = "SELECT * FROM devinette WHERE id = :id";
    $bdd = new PDO("mysql:host=localhost;dbname=devinette;charset=utf8", "root", "root");
    $req = $bdd->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $row = $req->fetch(PDO::FETCH_ASSOC);

    $devinette = new Devinette();
    $devinette->setId($row['id']);
    $devinette->setName($row['name']);
    $devinette->setQuestion($row['question']);
    $devinette->setAnswer($row['answer']);
    $devinette->setCreatedAt($row['created_at']);

    return $devinette;
  }
}
