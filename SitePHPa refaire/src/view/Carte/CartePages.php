<?php

  $this->title="La carte : ".$ObjectCarte->getNom();
  $this->content ="<h2>Descritpion</h2><br>"; //key_exists('id',$_GET)? $_GET['id']: null;
  $this->content.=$ObjectCarte->getContenue()."<br>";
  //$this->content.="La date d'édition est : ".$ObjectCarte->getDate()."<br>";
  if ($ObjectCarte->getAttaque()==""){
    $getAttaque='Non renseigner';
  }else{$getAttaque=$ObjectCarte->getAttaque();}
  $this->content.="Les point d'attaque de la carte sont: ".$getAttaque."<br>";
  if ($ObjectCarte->getVie()==""){
    $getVie='Non renseigner';
  }else{$getVie=$ObjectCarte->getVie();}
  $this->content.="Les point de vie de la carte sont: ".$getVie."<br>";
  if ($id !==null){
  $this->content .= '<br>';
  $this->content .= "<a href='".$this->router->getCarteAskDeletionURL($id)."'>Supprimer</a>";
  $this->content .= '<br>';
  $this->content .= "<a href='".$this->router->getCarteModifURL($id)."'>Modifier</a>";
}




 ?>
