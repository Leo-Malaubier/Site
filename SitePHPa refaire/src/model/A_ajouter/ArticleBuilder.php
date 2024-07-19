<?php
require_once("model/Article.php");
class ArticleBuilder{
  private $data;
  private $error=null;

  const NAME_REF="Article";
  const CONTENT_REF="Contenue";
  const DATE_REF="date";
  const ATTAQUE_REF="image";


  public function __construct($data=null){
    $this->data=$data;
  }

  //-----------------methodes------------------------

public function createCarte(){
  return new Article($this->data[self::NAME_REF],$this->data[self::CONTENT_REF],$this->data[self::DATE_REF],$this->data[self::ATTAQUE_REF]);

}

public function isValid(){

  if ($this->data[self::NAME_REF]==='' || $this->data[self::CONTENT_REF]==='' || $this->data[self::DATE_REF]===''){
    //$this->View->makeUnexpectedErrorPage("saisie invalide");
    $this->error="information manquante";
    return false;
  }else{
    if ($this->data[self::DATE_REF]<0){
      //$this->View->makeUnexpectedErrorPage("année inférieur a 0");
      $this->data=array_replace($this->data,array(self::DATE_REF => ''));
      $this->error="la date ne peux être négative";
      return false;
    } else{
      return true;
    }
  }

}
  //-----------------ghetter------------------------
  public function getdata() {
		return $this->data;
	}

  public function geterror() {
		return $this->error;
	}
    //-----------------setter------------------------
    public function setdata($data) {
      $this->data=$data;
    }
    public function seterror($error){
      $this->error=$error;
    }


}
 ?>
