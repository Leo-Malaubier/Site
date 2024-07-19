<?php

$SafeData=$this->SafeData($data);
$CarteBuilder= new CarteBuilder($SafeData);
if ($CarteBuilder->isValid()==true){
  $objet= $CarteBuilder->createCarte();
  $this->CarteDataBase->modif($id,$objet);
  unset($_SESSION['currentModifCart']);
  $this->View->displayCarteModificationSuccess($id);
  }else{
    $_SESSION['currentModifCart']=$CarteBuilder;
    $this->View->displayCarteModificationFailure($id);
  }

 ?>
