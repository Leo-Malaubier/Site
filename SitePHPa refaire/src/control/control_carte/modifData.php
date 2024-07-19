<?php

if($this->CarteDataBase->exist($id)!=null){
  if(key_exists('currentModifCart',$_SESSION)){
    $this->View->modifCarteBuilderInstance($id,$_SESSION['currentModifCart'],new CarteBuilder());
  }else{
    $this->View->modifCarteInstance($id,$this->CarteDataBase->read($id),new CarteBuilder());
  }
}else{
  $this->View->makeUnknownPage("Id de modification non trouvé");
}

 ?>
