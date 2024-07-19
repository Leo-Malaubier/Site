<?php
require_once("model/Article.php");
interface StorageArticle{

public function read($id);

public function readAll();

public function create(Article $article);

public function delete($id);
}


 ?>
