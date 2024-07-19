<!DOCTYPE html>
<html lang="fr">

<link rel="icon" type="image/png" href="image/Logo.png">
<?php
$metaData=require_once('metaData.php');


 ?>
 <body>
   <?php $header=require_once('header.php'); ?>
   <?php
   if( $this->feedback!==null){
     echo "INFO:".$this->feedback;
   }
   ?>
   <h1><?php echo $this->title; ?> </h1><br>
        <?php echo  $this->content; ?>
 </body>

 </html>
