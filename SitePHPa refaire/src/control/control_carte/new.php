<?php

if (key_exists('currentNewCarte',$_SESSION)){
  $this->View->makeCarteCreationPage($_SESSION['currentNewCarte']);
}else{
$this->View->makeCarteCreationPage(new CarteBuilder());
}

 ?>
