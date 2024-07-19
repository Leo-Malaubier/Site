<?php

$this->title='À propos';
$v ="<div>";
  $v  .="<p> numéro étudient: 21903309 </p>";
  $v .="<br>";
  $v .= "<h1>travaille réalisté:</h1>";
  $v .="<ul>";
    $v .= "<li>Liste d'objets, affichables indépendamment </li>";
    $v .= "<li>Création basique d'objets</li>";
    $v .= "<li>Modification basique d'objets</li>";
    $v .= "<li>Builders pour la manipulation d'objets</li>";
    $v .= "<li>Suppression d'objets </li>";
    $v .= "<li>Redirection en GET après création/modif/suppression</li>";
    $v .= "<li>Gestion du feedback</li>";
    $v .= "<li>Redirection en GET après POST même lors des erreurs</li>";
    $v .= "<li>HTML valide</li>";
    $v .= "<li>Architecture MVCR</li>";
  $v .="</ul>";
  $v .= "<h1>Compléments réalisté:</h1>";
  $v .= "<ol>";
    $v .= "<li>Pagination de la liste (10 éléments par pages)</li>";
  $v .= "</ol>";
  $v .= "<h1>Récapitulatif des consignes:</h1>";
  $v .= "<p>Tout les élément suivant on été réalisé</p>";
  $v .="<ul>";
    $v .= "<li>liste de tous les objets</li>";
    $v .= "<li>Chaque objet de la liste à une page dédiée avec plus ed détails</li>";
    $v .= "<li>il est possible:</li>";
    $v .="<ul>";
      $v .= "<li>d'ajouté des objets</li>";
      $v .= "<li>de supprimer nimporte quelle objet</li>";
      $v .= "<li>de modifier nimporte quelle objet</li>";
    $v .="</ul>";
  $v .= "<li>La page à propos qui est faite</li>";
  $v .="</ul>";
  $v .= "<h1>Ce qui n'a pas été réalisté:</h1>";
  $v .= "<p>Pour le moment seul la connection a une base de donnée SQL n'a pas été faite.</p>";
  $v .= "<p>Cependant des test on été fait et une base créer mais aillant des problement de connection avec la base de donnée,l'intégration n'a pas été faite.</p>";
  $v .= "<p>Des échanges on été fait avec un professeur mais les problem on percisté</p>";
  $v .= "<p>Le fichier CarteSorageMySQL est donc toujour présent pour montré que j'ai essayé, mais il n'est pas utilisé dans cette version sur site</p>";
$v .="</div>";
$this->content=$v;

 ?>
