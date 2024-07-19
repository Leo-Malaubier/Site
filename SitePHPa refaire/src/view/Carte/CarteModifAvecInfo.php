<?php

if($carte->getdata()==null){
  $name='';
  $content='';
  //$date='';
  $attaque='';
  $hp='';

}else{
  $data=$carte->getdata();
  $name=$data[$carte::NAME_REF];
  $content=$data[$carte::CONTENT_REF];
  //$date=$data[$carte::DATE_REF];
  $attaque=$data[$carte::ATTAQUE_REF];
  $hp=$data[$carte::VIE_REF];
}

$this->title = 'Modification';
$v ="<div class='formulaire'>";
$v .="<form action='".$this->router->getCarteSaveModifURL($id)."' method='POST'>\n";

$v .= "<label> Nom de la carte <input type='text'  name='".$CarteBuilder::NAME_REF."' value='".htmlspecialchars($name, ENT_QUOTES)."' ><br></label>";

$v .= "<label> Contenue de la carte <input id='text' type='text'  name='".$CarteBuilder::CONTENT_REF."' value='".htmlspecialchars($content, ENT_QUOTES)."' ><br></label>";

//$v .= "<label> Date de sortie<input type='date' name='".$CarteBuilder::DATE_REF."' value='".htmlspecialchars($date, ENT_QUOTES)."'><br></label>";
$v .= "<label>Point de vie  <input type='number' name='".$CarteBuilder::ATTAQUE_REF."' value='".htmlspecialchars($attaque, ENT_QUOTES)."'><br></label>";
$v .= "<label>Point d'attaque <input type='number' name='".$CarteBuilder::VIE_REF."' value='".htmlspecialchars($hp, ENT_QUOTES)."'><br></label>";

$v .= '<br>';
$v.= '<button type=submit>Modifier</button>';
if ($CarteBuilder->geterror()!=null){
  $v .='<br>';
  $v .=$CarteBuilder->geterror();
}
$v .="</form>";
$v .="</div>";
$this->content =$v;

 ?>
