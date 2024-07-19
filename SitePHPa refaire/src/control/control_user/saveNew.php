<?php
/*
1.protège les données.
2.créer un nouveaux model d'utilisateur
3.vérifie si les données des nouveaux utilisateur sont correcte a ce que l'on attend
  3.1 créer un nouvelle utilisateur
  3.2 l'inssert a la base de donnée
  3.3détruit la varriable de session
  3.4Message de validation
4.met dans la variable des session le model actuelle
5.Message des session d'erreur
*/
$SafeData=$this->SafeData($data);
$userBuilder= new userBuilder($SafeData);
if ($userBuilder->isValid()==true){
  $objet= $userBuilder->createCarte();
  $id=$this->userBuilder->create($objet);
  unset($_SESSION['currentNewUser']);
  $this->View->displayUserCreationSuccess($id);
}else{
  $_SESSION['currentNewUser']=$userBuilder;
  $this->View->displayuserCreationFailure();
}

 ?>
