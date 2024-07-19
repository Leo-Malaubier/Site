<?php
if ($Npage == null or $Npage==0){
  $Npage=0;
}else{
  $Npage=$Npage-1;
}
$curentPage=$Npage;

$listePage= $this->CarteDataBase->ReadAll();
$Nelement= count($listePage); //nombre d'élément dans la liste

$value= $Nelement / $this->ElementPage; //calcule du nombre de page max
$valeueRound=ceil($value); //arrondie au supérieur

if(intval($valeueRound)==0){
  $valeueRound=1;
}
if ($Npage!==0){
  $Npage=$Npage*$this->ElementPage; //augmentation de décimal vu que $this->ElementPage =10
}
$NewArray=[];
$static=$Npage;

for($Npage;$Npage <= $static+$this->ElementPage-1;$Npage++){
  if ($Npage>=$Nelement){
    break;
  }else{
    $NewArray += [array_keys($listePage)[$Npage]=>array_values($listePage)[$Npage]];
  }
}
$this->View->makeListPage($NewArray,$valeueRound,$curentPage);
 ?>
