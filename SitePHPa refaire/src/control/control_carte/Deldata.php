<?php

if ($this->CarteDataBase->exist($id)!=null){
  $this->CarteDataBase->delete($id);
  $this->View->displayCarteSuppressionSuccess();
}else{
  $this->View->displayCarteSuppressionFailure();
}

 ?>
