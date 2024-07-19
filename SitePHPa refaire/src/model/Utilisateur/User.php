
<?php
require_once("model/Utilisateur/UserStorageFileMySQL.php");
class User{
  private $pseudo;
  private $mdp;
  private $mail;

  public function __construct($pseudo=null,$mdp=null,$mail=null){
    $this->pseudo=$pseudo;
    $this->mdp=$mdp;
    $this->mail=$mail;
  }
  public function getPseudo(){
    return $this->pseudo;
  }
  public function getMDP(){
    return $this->mdp;
  }
  public function getMail(){
    return $this->mail;
  }
  public function newUserStorageFile(){
    return new UserStorageFileMySQL();
  }
}


 ?>
