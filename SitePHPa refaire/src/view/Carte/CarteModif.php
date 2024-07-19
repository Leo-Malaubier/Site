<?php

    $this->title = 'Modification';
    $v ="<div class='formulaire'>";
    $v .="<form action='".$this->router->getCarteSaveModifURL($id)."' method='POST'>\n";

    $v .= "<label> Nom de la carte <input type='text'  name='".$CarteBuilder::NAME_REF."' value='".htmlspecialchars($carte->getNom(), ENT_QUOTES)."' ><br></label>";

    $v .= "<label> Contenue de la carte <input id='text' type='text'  name='".$CarteBuilder::CONTENT_REF."' value='".htmlspecialchars($carte->getContenue(), ENT_QUOTES)."' ><br></label>";

    //$v .= "<label> Date de sortie<input type='date' name='".$CarteBuilder::DATE_REF."' value='".htmlspecialchars($carte->getDate(), ENT_QUOTES)."'><br></label>";
    $v .= "<label>Point de vie  <input type='number' name='".$CarteBuilder::ATTAQUE_REF."' value='".htmlspecialchars($carte->getAttaque(), ENT_QUOTES)."'><br></label>";
    $v .= "<label>Point d'attaque <input type='number' name='".$CarteBuilder::VIE_REF."' value='".htmlspecialchars($carte->getVie(), ENT_QUOTES)."'><br></label>";

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
