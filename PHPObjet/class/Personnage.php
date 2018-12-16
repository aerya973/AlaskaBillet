<?php

class Personnage {
  // ATTRIBUTS
  private $_force = 40;
  private $_classe = "Plombier";
  private $_couleurCasquette = "Rouge";
  private $_vie = 100;
  private $_nom = "Unknown";


  //CONSTRUCTEUR
  public function __construct($nom, $force, $_couleur){
    $this->_nom = $nom;
    $this->setForce($force);
    $this->setCouleurCasquette($_couleur);
  }

  //METHODE
  public function getForce(){
    return $this->_force;
  }

  public function setForce($force){
    $this->_force = $force;
  }
  public function setCouleurCasquette($couleur){
    $this->_couleurCasquette = $couleur;
  }

  public function getClasse(){
    return $this->_classe;
  }

  public function infoPerso(){
    return "<p>".$this->_nom." a une force de ".$this->_force." est de classe ".$this->_classe." et a une casquette de couleur ".$this->_couleurCasquette.".</p>";
  }

  public function frapper(Personnage $personnage){
    return $personnage->recevoirDegats($this->_force);
  }

  public function recevoirDegats($force){
    $this->_vie = $this->_vie - $force;

    if($this->_vie <= 0) {
        echo "<p>".$this->_nom." a perdu ".$force." points de vie.Il vient de succomber a ses blessures.</p>";
    } else {
        echo "<p>".$this->_nom." a perdu ".$force." points de vie.Il lui reste".$this->_vie.".</p>";
    }
  }
}

$mario = new Personnage("Mario", 70, "rouge");
$luigi = new Personnage("Luigi", 50, "verte");
echo $mario->infoPerso();
echo $luigi->infoPerso();
$mario->frapper($luigi);
$luigi->frapper($mario);
$mario->frapper($luigi);
