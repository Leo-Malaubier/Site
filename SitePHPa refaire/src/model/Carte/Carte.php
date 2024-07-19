<?php
require_once("model/Carte/CarteStorageFileMySQL.php");
class Carte{
  private $Nom;
  private $Contenue;
  //private $Date; //date de parution
  private $Attaque;
  private $Vie;

  public function __construct($name=null,$content=null,$attack=null,$Hp=null){
    $this->Nom=$name;
    $this->Contenue=$content;
  //  $this->Date=$date;
    $this->Attaque=$attack;
    $this->Vie=$Hp;
  }
  //-----------------ghetter------------------------
  /* Renvoie le Nom de la carte */
	public function getNom() {
		return $this->Nom;
	}
  /* Renvoie la desciption de la carte*/
	public function getContenue() {
		return $this->Contenue;
	}
/*  // Renvoie l'année de parution de la carte 
	public function getDate() {
		return $this->Date;
	}*/
  /* Renvoie les point d'attaque de la carte */
	public function getAttaque() {
		return $this->Attaque;
	}
  /* Renvoie les point de vie de l'attaque */
  public function getVie() {
    return $this->Vie;
  }
  public function newCarteStorageFile(){
    return new CarteStorageFileMySQL();
  }

}
 ?>
