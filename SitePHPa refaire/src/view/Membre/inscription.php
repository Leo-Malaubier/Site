<?php

if($userBuilder->getdata()==null){
  $name='';
  $content='';
  $attaque='';
  $hp='';

}else{
  $data=$userBuilder->getdata();

  $name=$data[$userBuilder::PSEUDO_REF];
  $date=$data[$userBuilder::MAIL_REF];
  $attaque=$data[$userBuilder::MDP_REF];
  $hp=$data[$userBuilder::MDP_VERIF];
}

$this->title = 'inscription';
$v="<div class='formulaire_inscription'>";
$v .="<form action='".$this->router->get_Inscription()."' method='POST'>\n";

$v .= "<label> pseudo<input type='text'  name='".$userBuilder::PSEUDO_REF."' value='".$name."' ><br></label>";
$v .= "<label> Mail <input type='text'  name='".$userBuilder::MAIL_REF."' value='".$content."' ><br></label>";
$v .= "<label>Mot de passe  <input type='text' name='".$userBuilder::MDP_REF."' value='".$attaque."'><br></label>";
$v .= "<label>Vérification mot de passe <input type='text' name='".$userBuilder::MDP_VERIF."' value='".$hp."'><br></label>";

$v .= '<br>';
$v.= '<button type=submit>Envoyer !</button>';

if ($userBuilder->geterror()!=null){
  $v .='<br>';
  $v .=$userBuilder->geterror();
}
$v .="</form>";
$v .="</div>";
$this->content =$v;

 ?>
