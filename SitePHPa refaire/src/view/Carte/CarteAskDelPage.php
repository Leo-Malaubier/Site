<?php

$this->title ='Confirmation de suppression';
$v="<div>";
$v .= "<p> voulez-vous vraiment supprimer cette élément?</p>";
$v .="<form action='".$this->router->getCarteDeletionURL($id)."' method='POST'> ";
$v .= '<br>';
$v.= '<button type=submit>Confirmer</button></form>';
$v.="</div>";
$this->content .=$v;
$this->content .='page demande de suppresion id= '.$id;

 ?>
