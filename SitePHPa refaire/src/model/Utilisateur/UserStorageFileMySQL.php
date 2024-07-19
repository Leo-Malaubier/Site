<?php
//vérifer les injection sql et script
require_once("model/Utilisateur/User.php");
require_once("model/Utilisateur/UserStorage.php");
//INSERT INTO Carte(nom,contenue,Date,attaque,vie) VALUES ('Proten Hulk','when oriteab hulk dues ...','2000-01-01',null,3);

class UserStorageFileMySQL implements StorageUser {
  private $DB;

  public function __construct(){
    try{
      $dsn="mysql:host=127.0.0.1;port=3306;dbname=test;charset=utf8";
      $user="root";
      $pass='';
      $temporaire=new PDO($dsn,$user,$pass);


      $this->DB=$temporaire;
    }catch(PDOException $e){
      echo("Echec de la connexion:".$e->getMessage());
      $this->DB='01';
      exit();
    }

  }


  public function exist($id){
    $prepar= $this->DB->prepare("SELECT * FROM users WHERE ID=?");
    $prepar->execute([$id]);
    $exist=$prepar->fetch();

    if($exist!=false){
      return true;
    }else{
      return null;
    }
    return null;
  }


  public function read($id){
    if ($this->exist($id)!=null){
      try{
      $prepar= $this->DB->prepare("SELECT * FROM users WHERE pseudo=?");
      } catch(Exception $e){

      }

      $prepar->execute([$id]);
      $exist=$prepar->fetch();
      $carte = new Carte($exist["pseudo"],$exist["mot_de_passe"],$exist["mail"]);
      return $carte;
    }else{
      return null;
    }
  }

  public function readAll(){
    $sql="SELECT * from users;";
    $request=$this->DB->query($sql);
    $Data=[];

    while ($result = $request->fetch()) {
    //  echo $result['ID'].'. '.$result['NomCarte'].'. '. $result["ContenueCarte"].'. '. $result["Date_Carte"].'. '. $result["PV"].'. '. $result["ATT"]."<br />";
      $Data[$result['id']] = $result['pseudo'];
    }
    //var_dump($Data);
    return $Data;
  }

  public function create(User $objet){
    $Nom=$objet->getPseudo();
    $Contenue=$objet->getMDP();
    //$Date=$carte->getDate();
    $Vie=$objet->getMail();


    $prepar=$this->DB->prepare("INSERT INTO users (pseudo,mot_de_passe,mail) VALUES (?,?,?); ");

    $prepar->execute([$Nom,$Contenue,$Vie]);
    return $this->DB->lastInsertId(); //return id
  }

  public function delete($id){
    echo($id);
    $prepar=$this->DB->prepare("DELETE FROM users WHERE ID = ?");
   $prepar->execute([$id]);
}

  public function modif($id,User $objet){
    $pseudo=$objet->getPseudo();
    $mdp=$objet->getMDP();
    //$Date=$carte->getDate();
    $mail=$objet->getMail();

    $prepar=$this->DB->prepare("UPDATE users SET pseudo=?,mot_de_passe=?,mail=? WHERE id=? ");
    $prepar->execute([$pseudo,$mdp,$mail,$id]);

  }
}
 ?>
