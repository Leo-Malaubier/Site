<?php

$this->title='Page de liste';
$v="<ul class='liste'>\n";
foreach ($ListeObjet as $key => $value){
  $v .='<li><a href="'.$this->router->getCarteURL($key).'">'.$value.'</a></li>';
}
$v.="</ul>\n";

$v.="<nav class='navigation'>";
$v.="<ul>\n";
for ($i=1;$i<=$MaxPage;$i++){
$v .='<li><a href="'.$this->router->getListePage($i).'">'.$i.'</a></li>';
}
$v.="</ul>\n";
$v.="</nav>";

$this->content = $v;

 ?>
