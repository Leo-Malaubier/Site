<?php
require_once("model/Carte/Carte.php");
interface Storage{


public function read($id);

public function readAll();

public function create(Carte $carte);

public function delete($id);
}


 ?>
