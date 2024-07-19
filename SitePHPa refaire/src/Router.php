<?php
require_once("view/View.php");
require_once("control/Controller.php");
require_once("model/Carte/CarteStorage.php");
require_once("model/Utilisateur/UserStorage.php");
//require_once("model/CarteBuilder");


class Router{
  protected $DataBase;
  private $url;
  const USER = "user";
  const CARTE = "carte";

  public function __construct() {
  }


  function main(){
    session_start();
    //session_destroy();


    $feedback = key_exists('feedback', $_SESSION) ? $_SESSION['feedback'] : '';
    $feedback = key_exists('connected', $_SESSION) ? $_SESSION['connected'] : '';
    $feedback = key_exists('pseudo', $_SESSION) ? $_SESSION['pseudo'] : '';
    $feedback = key_exists('id', $_SESSION) ? $_SESSION['id'] : '';
    $feedback = key_exists('mail', $_SESSION) ? $_SESSION['mail'] : '';

    $_SESSION['feedback'] =null;
    $_SESSION['connected']=false;
    $_SESSION['pseudo']=null;
    $_SESSION['id']=null;
    $_SESSION['mail']=null;

    $View = new View($this,$feedback);

    $id=key_exists('id',$_GET)? $_GET['id']: null;
    $action=key_exists('action',$_GET)? $_GET['action']: null;
    $page=key_exists('page',$_GET)? $_GET['page']: null;

    $liste=key_exists('liste',$_GET)? true : null;
    $carte=key_exists('carte',$_GET)? true: null;

    $user=key_exists('user',$_GET)? $_GET['user'] : null;

    try{

      if($carte !== null){

        $objet= new Carte;
        $this->DataBase=$objet->newCarteStorageFile();
        $ctl = new Controller($View,$this->DataBase);

        if ($action !== null){

          switch ($action){
            case "nouveau" :
              $ctl->new(self::CARTE);
              break;

            case "sauverNouveau":
              $ctl->saveNew(self::CARTE,$_POST);
              break;

            case "AskDel":
              if($id!==null){
                $ctl->AskDelData(self::CARTE,$id);
                break;
              }else{
                $View->makeUnexpectedErrorPage("page introuvable");
              }

            case "Del":
              if($id!==null){
                $ctl->Deldata(self::CARTE,$id);
                break;
              }else{
                $View->makeUnexpectedErrorPage("page introuvable");
              }

            case "Modif":
              if($id!==null){
                $ctl->modifData(self::CARTE,$id);
                break;
              }else{
                $View->makeUnexpectedErrorPage("page introuvable");
              }
            case "ModifSave":
              if($id!==null){
                $ctl->modifSaveData(self::CARTE,$id,$_POST);
                break;
              }else{
                $View->makeUnexpectedErrorPage("page introuvable");
              }
            default:
              $View->makeUnexpectedErrorPage("page introuvable");
              break;
          }
        }
        //toujours pour les cartes
        else{
           if ($liste===true){
             $ctl->showList($page);
           }
           else{
             if ($id!==null){
               $ctl->showInformation(self::CARTE,$id);
             }
             else{
               $View->makeHomePage();
             }
           }
         }
       }//fin d'action pour les cartes
       elseif($user !== null){

         $objet= new User;
         $this->DataBase=$objet->newUserStorageFile();
         $ctl = new Controller($View,$this->DataBase);

         switch ($user){
           case 'inscription':
             $ctl->new(self::USER);
             break;
           case 'inscriptionSave':
             $ctl->saveNew(self::USER,$_SESSION);
             break;

           case 'desinscription':
             $ctl->Deldata(self::USER,$id);
             break;

           case 'desinscription_confirmation':
             $ctl->askDeldata(self::USER,$id);
             break;

           case 'modification':
             $ctl->modifData(self::USER,$id);
             break;

           case 'modificationSave':
             $ctl->modifSaveData(self::USER,$id,$_SESSION);
             break;

          case 'info':
            $ctl->showInformation(self::USER,$id);

           case 'connexion':
             $ctl->connexion();
             break;

           case 'deconnexion':
             $ctl->deconnexion();
             break;

         }
       }
       else{
         if ($action !== null){
           switch ($action){
             case "Apropos" :
               $View->makeAPropos();
               break;

             default:
               $View->makeUnexpectedErrorPage("page introuvable");
               break;
             }
           }else{
             $View->makeHomePage();
           }
         }
      }catch (Exception $e){
        $View->makeUnexpectedErrorPage($e);
      }

    $View->render();
  }


  public function getHomeURL(){
    return "index.php";
  }
  public function getListePage($id=null){
    return "?carte&liste&page=$id";
  }
  public function getCarteURL($id){
    return "?carte&id=$id";
  }
  public function getCarteSaveURL(){
    return "?carte&action=sauverNouveau";
  }
  public function getCarteCreationPage(){
    return "?carte&action=nouveau";
  }
  public function getCarteModifURL($id){
    return "?carte&action=Modif&id=$id";
  }
  public function getCarteSaveModifURL($id){
    return "?carte&action=ModifSave&id=$id";
  }
  public function getCarteAskDeletionURL($id){
    return "?carte&action=AskDel&id=$id";
  }
  public function getCarteDeletionURL($id){
    return "?carte&action=Del&id=$id";
  }

  public function getAPropos(){
    return "?action=Apropos";
  }
  public function get_Inscription(){
    return "?user=inscription";
  }
  public function POSTredirect($url,$feedback){
    $_SESSION['feedback']=$feedback;
      header("Location: " . $url, true, 303);
      die;
  }
}

 ?>
