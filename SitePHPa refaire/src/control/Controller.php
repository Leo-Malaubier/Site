<?php
require_once("view/View.php");
require_once("model/Carte/Carte.php");
require_once("model/Carte/CarteBuilder.php");
require_once("model/Utilisateur/User.php");
require_once("model/Utilisateur/UserBuilder.php");

class Controller{
  private $View;
  private $CarteDataBase;
  private $ElementPage; // nombre d'élément par page


  public function __construct(View $view, $DataBase){
    $this->View =$view;
    $this->CarteDataBase= $DataBase;
    $this->ElementPage=10;
  }

  public function SafeData(array $data){
    $SafeData=array();
    foreach ($data as $key=>$value) {
      $SafeData=array_replace($SafeData,array($key => htmlspecialchars($value)));
    }
    return $SafeData;
  }

  public function showInformation($who,$id=null) {
    switch($who){
      case "carte":
        require_once("control_carte/showInformation.php");
        break;

      case "user":
        require_once("control_user/showInformation.php");
        break;

      default:
          $View->makeUnexpectedErrorPage("page introuvable");
          break;
    }
  }

  public function showList($Npage){//numéro de la page POUR CARTE
    require_once("control_carte/showList.php");
  }


  public function saveNew($who,array $data){
    switch($who){
      case "carte":
        require_once("control_carte/saveNew.php");
        break;

      case "user":
        require_once("control_user/saveNew.php");
        break;

      default:
          $View->makeUnexpectedErrorPage("page introuvable");
          break;
    }
  }
  public function new($who){
    switch($who){
      case "carte":
        require_once("control_carte/new.php");
        break;

      case "user":
        require_once("control_user/new.php");
        break;

      default:
          $View->makeUnexpectedErrorPage("page introuvable");
          break;
    }
  }

  public function Deldata($who,$id=null){
    switch($who){
      case "carte":
        require_once("control_carte/Deldata.php");
        break;

      case "user":
        require_once("control_user/Deldata.php");
        break;

      default:
          $View->makeUnexpectedErrorPage("page introuvable");
          break;
    }
  }

  public function AskDelData($who,$id=null){
    switch($who){
      case "carte":
        require_once("control_carte/askDelData.php");
        break;

      case "user":
        require_once("control_user/askDelData.php");
        break;

      default:
          $View->makeUnexpectedErrorPage("page introuvable");
          break;
    }
  }


public function modifData($who,$id){
  switch($who){
    case "carte":
      require_once("control_carte/modifData.php");
      break;

    case "user":
      require_once("control_user/modifData.php");
      break;

    default:
        $View->makeUnexpectedErrorPage("page introuvable");
        break;
  }
}

public function modifSaveData($who,$id,array $data){
  switch($who){
    case "carte":
      require_once("control_carte/modifSaveData.php");
      break;

    case "user":
      require_once("control_user/modifSaveData.php");
      break;

    default:
        $View->makeUnexpectedErrorPage("page introuvable");
        break;
  }
  }

public function connexion(){
  require_once("control_user/connexion.php");
  return false;
}
public function deconnexion(){
  require_once("control_user/deconnexion.php");
  return false;
}
}

 ?>
