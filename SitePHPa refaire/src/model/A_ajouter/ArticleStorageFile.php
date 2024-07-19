<?php
require_once("lib/ObjectFileDB.php");
require_once("model/Article.php");
require_once("model/ArticleStorage.php");

class ArticleStorageFile implements Storage{
  protected $DataBase;

  public function __construct($file){
    $this->DataBase= new ObjectFileDB($file);
    $res=$this->DataBase->fetchAll();
    if (count($res)==0){
      $this->reinit();
    }
  }


  public function reinit(){
    $this->DataBase->deleteAll();
    /*$this->DataBase->insert(new Article("Titre",
                                          "Contenue",
                                          "Date",
                                          "Image",
                                          "Lien"));
    */
    $this->DataBase->insert(new Article("Logiciel d'aide à la formation de nouveaux arrivant _Stellentis (python/xml)",
                                        "<p>Logiciel réalisé dans le cadre d'un stage dans l'entreprise Stellentis.<p>
                                        <p>Logiciel simulant une machine de l'entreprise.<p>
                                        <p>La Simulation est 'programmable' via le remplissage d'un fichier csv/xlsx<p>
                                        <p>Ce logiciel est un début fonctionnel pour la création d'un outil plus complexe.<p>
                                        <p>C'est un logiciel créé à partir de rien en seulement 2 mois, réalisé en solitaire.<p>
                                        <p>L'utilisation de différentes libraires python est requis comme :<p>
                                        <ul> <li>lxml</li>
                                        <li>pandas</li>
                                        <li>openpyxl</li>
                                        <li>logging</li></ul>
                                        <p>Je vous invite fortement à aller consulter le rapport pour comprendre les détails du programme.<p>
                                        <p>(rapport disponible sur le Github)<p>
                                        <p>Vous pourrez voir 2 versions du logiciel, chacune avec une interface graphique différente.<p>
                                        <p>Logiciel respectant le modèle : Model/Vew/Controler<p>",

                                        "2022/2023",

                                        "image/Stellentis_Projet.png",
                                        "https://github.com/Leo-Malaubier/Stellentis-projet_aide-a-la-formation"));
    $this->DataBase->insert(new Article("Génération de pages internet _ Page automatique Université CAEN (python/html)",
                                      "<p>Petit projet réalisé en 2022 pour l'université de Caen (posté en 2023)<p>
                                        <p>Logiciel permettant de remplir un fichier xlsx/csv et d'en générer un fichier html que l'on peut mettre sur un site internet<p>
                                        <p>et qui envoie une notification par mail du nouveau site.<p>
                                        <p>vous pouvez consulter le rapport sur github<p>
                                        <p>j'ai réalisé 2 vidéos pour montrer le fonctionnement du logiciel<p>
                                        <p>ce logiciel n'avait pas été fini.<p>
                                        <p>Voici les deux vidéos:p>
                                        <ul><li>-<a href=https://youtu.be/HJRj7012bjw>https://youtu.be/HJRj7012bjw</a></li>
                                        <p>qui montre le fonctionnement général<p>
                                        <li>-<a href=https://youtu.be/9Q2jSRWGCx8>https://youtu.be/9Q2jSRWGCx8</a></li></ul>
                                        <p>qui montre l'envoi de mail pour notification<p>
                                        <p>Il est possible que la version disponible ne soit pas exactement la même que dans les vidéos, les fichiers du projet on été retrouvé a divers endroits <p>",

                                        "2022",

                                        "image/Projet_Fac.png",

                                        "https://github.com/Leo-Malaubier/projet-de-g-n-ration-de-page-automatique"));


  $this->DataBase->insert(new Article("BlackJack Université CAEN (java)",
                                        "<p>Jeux BlackJack réalisé à l'université<p>
                                        <p>Le projet contient une libraire Carte et le jeu Blackjack utilisant la libraire (les deux ont été réalisé)<p>
                                        <p>Les deux dossiers contiennent respectivement :<p>
                                        <ul><li>Un répertoire src contenant le code commenté</li>
                                        <li> un répertoire doc contenant la Javadoc</li>
                                        <li> un répertoire dist contenant l'exécutable ou la librairie</li>
                                        <li>un fichier build.xml repris du cours (pour qu'il fonctionne, il faut créer des répertoires supplémentaires comme test)</li>
                                        <li>un rapport</li>

                                        <p>/!\Chaque dossier contient un rapport différent.<p>
                                        <p>Les rapports sont mis en avent sur github, je vous invite donc à aller les consulter.<p>
                                        <p>Les javadoc's étant trop volumineuses, vous pouvez les consulter ici:<p>
                                        <p>Carte:</p><a href=https://doccarte.farandoledesserveurs.fr>https://doccarte.farandoledesserveurs.fr</a>
                                        <p>Blackjack:</p><a href=https://docblackjack.farandoledesserveurs.fr>https://docblackjack.farandoledesserveurs.fr</a>
                                        <p>l'interface graphique est à finir.<p>",
                                        "2023",
                                        "image/java.png",
                                        "https://github.com/Leo-Malaubier/Blackjack_java"));
    $this->DataBase->insert(new Article("Site PHP Université CAEN (php/html/css)",
                                          "<p> Site conçu pour un projet en php<p>
                                          <p>Je vous refaire à la section 'à propos' de ce dernier en cliquant<p><a href=https://phpuniversite.farandoledesserveurs.fr/index.php?action=Apropos>ici<a>",
                                          "2023",
                                          "image/php_universite.png",
                                          "https://phpuniversite.farandoledesserveurs.fr/"));
  }

  public function exist($id){
    return $this->DataBase->exists($id);
  }
  public function read($id) { //renvoie l'élément demandé
    if ($this->DataBase->exists($id)){
        return $this->DataBase->fetch($id);
    }
    return null;

	}

	public function readAll() { //renvoie tout le tableau
		return $this->DataBase->fetchAll();
	}
  public function create(Article $article){
    return $this->DataBase->insert($article);
  }
  public function delete($id){
    $this->DataBase->delete($id);
  }
  public function modif($id,Article $objet){
    $this->DataBase->update($id,$objet);
  }

}

 ?>
