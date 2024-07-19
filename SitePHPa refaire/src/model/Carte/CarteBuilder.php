<?php
require_once("model/Carte/Carte.php");
class Cartebuilder{
  private $data;
  private $error=null;

  const NAME_REF="Nom";
  const CONTENT_REF="Contenue";
  //const DATE_REF="date";
  const ATTAQUE_REF="attaque";
  const VIE_REF="vie";

  public function __construct($data=null){
    $this->data=$data;
  }

  //-----------------methodes------------------------

public function createCarte(){
  return new Carte($this->data[self::NAME_REF],$this->data[self::CONTENT_REF],$this->data[self::ATTAQUE_REF],$this->data[self::VIE_REF]);

}

public function isValid(){
// || $this->data[self::DATE_REF]===''
  if ($this->data[self::NAME_REF]==='' || $this->data[self::CONTENT_REF]===''){
    //$this->View->makeUnexpectedErrorPage("saisie invalide");
    $this->error="information manquante";
    return false;
  }
  /*else{
    if ($this->data[self::DATE_REF]<0){
      //$this->View->makeUnexpectedErrorPage("année inférieur a 0");
      $this->data=array_replace($this->data,array(self::DATE_REF => ''));
      $this->error="la date ne peux être négative";
      return false;
    } else{
      return true;
    }
  }*/
  return true;

}
  //-----------------ghetter------------------------
  public function getdata() {
		return $this->data;
	}

  public function geterror() {
		return $this->error;
	}
  /*  //-----------------setter------------------------
    public function setdata($data) {
      $this->data=$data;
    }*/
    public function seterror($error){
      $this->error=$error;
    }


}
 ?>
