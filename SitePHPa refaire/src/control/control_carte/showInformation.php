<?php
$element= $this->CarteDataBase->read($id);
if($element !== null){
  $this->View->makeCartePage($element,$id);
}
else{
  $this->View->makeUnknownPage();
}

 ?>
