<?php

if (key_exists('currentNewUser',$_SESSION)){
  $this->View->makeMumbersCreationPages($_SESSION['currentNewUser']);
}else{
$this->View->makeMumbersCreationPages(new UserBuilder());
}

 ?>
