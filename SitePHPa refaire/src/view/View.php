<?php
require_once("Router.php");
//utilisez les variable de seesion, au lieux d'envoyé des paramètres
class View{
  private $title;
  private $content;
  private $router;
  private $menu;
  private $feedback;

  public function __construct(Router $router,$feedback){
    $this->title =null;
    $this->content =null;
    $this->router=$router;
    $this->menu=array(
        "Acceuil"=>$this->router->getHomeURL(),
        "Liste de cartes"=>$this->router->getListePage(),
        "Ajouter une carte"=>$this->router->getCarteCreationPage(),
        "A propos"=>$this->router->getAPropos(),
        "Inscritpion"=>$this->router->get_Inscription()
    );
    $this->feedback=$feedback;
  }

  public function render(){
    if ($this->title === null && $this->content === null) {
         $this->makeUnexpectedErrorPage("rien");
     }
     else{
       require_once('Base/squelette.php');
     }
  }
//gestion d'erreurs.
public function makeDebugPage($variable) {
  $this->title = 'Debug';
  $this->content = '<pre>'.htmlspecialchars(var_export($variable, true)).'</pre>';
}

public function makeUnknownPage($id=null){
  if ($id!==null){
    $this->router->POSTredirect($this->router->getListePage(),$id);
  }else{
    $this->router->POSTredirect($this->router->getListePage(),"ERREUR : carte inconnue / page introuvable");
  }
}
//HomePage
  public function makeHomePage() {
    $this->title = "Bienvenue !";
    $this->content = "Un site sur les cartes magic.";
  }
//création de carte
  public function makeCartePage(Carte $ObjectCarte,$id=null){
    require_once("Carte/CartePages.php");
  }

  public function makeUnexpectedErrorPage($id){
    $this->router->POSTredirect($this->router->getHomeURL(),"ERREUR : une erreur innatendue est survenue <br>".$id);
  }
//Liste des carte de la base de donnée
  public function makeListPage($ListeObjet,$MaxPage,$ActuelPage){
    require_once("Carte/ListeCartes.php");
  }

//Suppression de cartes
  public function makeAskDelPage($id){
    require_once("Carte/CarteAskDelPage.php");
  }

  public function displayCarteSuppressionSuccess(){
    $this->router->POSTredirect($this->router->getListePage(),"suppresion effectuer");
  }
  public function displayCarteSuppressionFailure(){
    $this->router->POSTredirect($this->router->getListePage(),"La suppresion de la carte a échoué");
  }

//création de carte
  public function makeCarteCreationPage(CarteBuilder $CarteBuilder){
    require_once("Carte/CarteCreationPage.php");
  }

  public function displayCarteCreationSuccess($id){
    $this->router->POSTredirect($this->router->getCarteURL($id),"Carte créer");
  }
  public function displayCarteCreationFailure(){
    $this->router->POSTredirect($this->router->getCarteCreationPage(),"Création d'une nouvelle carte invalide");
  }

//permet de récupérer des information dans les input si l'on actualise la page
  public function modifCarteBuilderInstance($id,Cartebuilder $carte,Cartebuilder $CarteBuilder){
      require_once("Carte/CarteModifAvecInfo.php");
  }
  public function modifCarteInstance($id,Carte $carte,Cartebuilder $CarteBuilder){
    require_once("Carte/CarteModif.php");
  }

  public function displayCarteModificationSuccess($id){
    $this->router->POSTredirect($this->router->getCarteURL($id),"Modification effectuer");
  }
  public function displayCarteModificationFailure($id){
    $this->router->POSTredirect($this->router->getCarteModifURL($id),"La modification de la carte est invalide");
  }
  //A propos
  public function makeAPropos(){
    require_once("Apropos/Apropos.php");
  }

  //Axès membres, connexion, authentification,déconnexion.
  public function makeMembersPage(Carte $ObjectCarte,$id=null){
    require_once("Membre/MembrePage.php");
  }

  public function makeMembersConnexionPage(Carte $ObjectCarte,$id=null){
    require_once("Membre/connexion.php");
  }
/*
  public function makeUnexpectedErrorPage($id){
    $this->router->POSTredirect($this->router->getHomeURL(),"ERREUR : une erreur innatendue est survenue <br>".$id);
  }*/

  //création membres
  public function makeMumbersCreationPages(userBuilder $userBuilder){
    require_once("Membre/inscription.php");
  }

  public function displayUserCreationSuccess($id){
    $this->router->POSTredirect($this->router->getCarteURL($id),"Utilisateur créer");
  }
  public function displayuserCreationFailure(){
    $this->router->POSTredirect($this->router->getCarteCreationPage(),"Création d'un nouvelle utilisateur invalide");
  }
/*
  public function displayCarteCreationSuccess($id){
    $this->router->POSTredirect($this->router->getCarteURL($id),"Carte créer");
  }
  public function displayCarteCreationFailure(){
    $this->router->POSTredirect($this->router->getCarteCreationPage(),"Création d'une nouvelle carte invalide");
  }
  */
}

 ?>
