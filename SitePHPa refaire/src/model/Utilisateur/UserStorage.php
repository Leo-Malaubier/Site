<?php
require_once("model/Utilisateur/User.php");
interface StorageUser{

public function read($id);

public function readAll();

public function create(User $user);

public function delete($id);
}


 ?>
