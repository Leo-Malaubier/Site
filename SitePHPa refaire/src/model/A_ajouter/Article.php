<?php
class Article{
  private $Titre;
  private $Contenue;
  private $Date; //date de parution
  private $Image;
  private $Lien;

  public function __construct($Titre=null,$content=null,$date=null,$image=null,$lien=null){
    $this->Titre=$Titre;
    $this->Contenue=$content;
    $this->Date=$date;
    $this->Image=$image;
    $this->Lien=$lien;
  }
  //-----------------ghetter------------------------
  /* Renvoie le Nom de la carte */
	public function getTitre() {
		return $this->Titre;
	}
  /* Renvoie la desciption de la carte*/
	public function getContenue() {
		return $this->Contenue;
	}
  /* Renvoie l'année de parution de la carte */
	public function getDate() {
		return $this->Date;
	}
  /* Renvoie les point d'attaque de la carte */
	public function getImage() {
		return $this->Image;
	}
  public function getLien() {
    return $this->Lien;
  }
  public function newArticleStorageFile(){
    return new ArticleStorageFile("../Stockage/Stockage_BD/Article_BD.txt");
  }

}
 ?>
