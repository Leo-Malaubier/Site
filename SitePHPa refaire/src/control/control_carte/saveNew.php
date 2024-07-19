<?php
/*
1.protège les données.
2.créer un nouveaux model de carte
3.vérifie si les données des la nouvelle carte sont correcte a ce que l'on attend
  3.1 créer une nouvelle carte
  3.2 l'inssert a la base de donnée
  3.3détruit la varriable de session
  3.4Message de validation
4.met dans la variable des session le model actuelle
5.Message des session d'erreur
*/
$SafeData=$this->SafeData($data);
$CarteBuilder= new CarteBuilder($SafeData);
if ($CarteBuilder->isValid()==true){
  $objet= $CarteBuilder->createCarte();
  $id=$this->CarteDataBase->create($objet);
  unset($_SESSION['currentNewCarte']);
  $this->View->displayCarteCreationSuccess($id);
}else{
  $_SESSION['currentNewCarte']=$CarteBuilder;
  $this->View->displayCarteCreationFailure();

}

 ?>
