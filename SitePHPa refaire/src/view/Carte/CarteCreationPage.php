<?php

if($CarteBuilder->getdata()==null){
  $name='';
  $content='';
  $attaque='';
  $hp='';

}else{
  $data=$CarteBuilder->getdata();
  $name=$data[$CarteBuilder::NAME_REF];
//  $content=$data[$CarteBuilder::CONTENT_REF];
  $date=$data[$CarteBuilder::DATE_REF];
  $attaque=$data[$CarteBuilder::ATTAQUE_REF];
  $hp=$data[$CarteBuilder::VIE_REF];
}

$this->title = 'Make New Page';
$v="<div class='formulaire'>";
$v .="<form action='".$this->router->getCarteSaveURL()."' method='POST'>\n";

$v .= "<label> Nom de la carte <input type='text'  name='".$CarteBuilder::NAME_REF."' value='".$name."' ><br></label>";

$v .= "<label> Contenue de la carte <input type='text'  name='".$CarteBuilder::CONTENT_REF."' value='".$content."' ><br></label>";

//$v .= "<label>Date de sortie <input type='date' name='".$CarteBuilder::DATE_REF."' value='".$date."'><br></label>";

$v .= "<label>Point de vie  <input type='number' name='".$CarteBuilder::ATTAQUE_REF."' value='".$attaque."'><br></label>";
$v .= "<label>Point d'attaque <input type='number' name='".$CarteBuilder::VIE_REF."' value='".$hp."'><br></label>";

$v .= '<br>';
$v.= '<button type=submit>Envoyer !</button>';

if ($CarteBuilder->geterror()!=null){
  $v .='<br>';
  $v .=$CarteBuilder->geterror();
}
$v .="</form>";
$v .="</div>";
$this->content =$v;

 ?>
