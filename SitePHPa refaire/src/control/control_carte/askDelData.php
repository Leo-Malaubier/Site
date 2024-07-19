<?php

if ($this->CarteDataBase->exist($id)!=null){
  $this->View->makeAskDelPage($id);
}else{
  $this->View->makeUnknownPage();
}

 ?>
