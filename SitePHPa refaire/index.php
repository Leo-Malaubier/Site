<?php
/*
 * On indique que les chemins des fichiers qu'on inclut
 * seront relatifs au répertoire src.
 */
set_include_path("./src");
require_once("Router.php");
require_once("model/Carte/CarteStorageFile.php");
$router = new Router();
$router->main(new Carte);
?>
