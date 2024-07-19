<?php
require_once("lib/ObjectFileDB.php");
require_once("model/Carte/Carte.php");
require_once("model/Carte/CarteStorage.php");

class CarteStorageFile implements Storage{
  protected $DataBase;

  public function __construct($file){
    $this->DataBase= new ObjectFileDB($file);
    $res=$this->DataBase->fetchAll();
    if (count($res)==0){
      $this->reinit();
    }
  }


  public function reinit(){
    $this->DataBase->deleteAll();
    $this->DataBase->insert(new Carte("Proten Hulk", "When Protean Hulk dies, search your library for any number of crea","1999","5","2"));
    $this->DataBase->insert(new Carte('Protecteur du bois', "Other Treefolk creatures you control get +1/+1.Other Treefolk and Forests you control have indestructible.","2000","2","2"));
    $this->DataBase->insert(new Carte('Thérapie de la Coterie', "Choose a nonland card name. Target player rev","2001","2","2"));

  }

  public function exist($id){
    return $this->DataBase->exists($id);
  }
  public function read($id) { //renvoie l'élément demandé
    if ($this->DataBase->exists($id)){
        return $this->DataBase->fetch($id);
    }
    return null;

	}

	public function readAll() { //renvoie tout le tableau
		return $this->DataBase->fetchAll();
	}
  public function create(Carte $carte){
    return $this->DataBase->insert($carte);
  }
  public function delete($id){
    $this->DataBase->delete($id);
  }
  public function modif($id,Carte $objet){
    $this->DataBase->update($id,$objet);
  }

}

 ?>
