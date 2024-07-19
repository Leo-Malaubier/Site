<?php
require_once("model/Utilisateur/User.php");
class UserBuilder{
  private $data;
  private $error=null;

  const PSEUDO_REF="pseudo";
  const MAIL_REF="mail";
  const MDP_REF='mdp';
  const MDP_VERIF='mdp_bis';
  public function ___construct($data=null){
    $this->data=$data;
  }
  public function createUser(){
    return new User($this->data[self::PSEUDO_REF],$this->data[self::MAIL_REF],$this->data[MDP_REF]);
  }
  public function isValid(){
    $this->error='';
    if($this->data[self::PSEUDO_REF]==='' || $this->data[self::PSEUDO_REF]==='' || $this->data[self::PSEUDO_REF]==='' || $this->data[self::PSEUDO_REF]==='' || $this->data[self::PSEUDO_REF]==='' ){
      $this->error +='information manquante, vous devez rentrer toutes les information demandé.';
      return false;
    }elseif($this->data[self::MDP_REF]!==$this->data[self::MDP_VERIF]){
      $this->error +=" les mots de passe saisie sont différents.";
      return false;
    }elseif($this->error == ''){
        $this->error = null;
        return true;
    }else{
      $this->View->makeUnexpectedErrorPage("une erreur innatendue est arrivé");
      return false;
    }
  }
  //-----------------ghetter------------------------
  public function getdata() {
    return $this->data;
  }

  public function geterror() {
    return $this->error;
  }

    public function seterror($error){
      $this->error=$error;
    }


}



 ?>
