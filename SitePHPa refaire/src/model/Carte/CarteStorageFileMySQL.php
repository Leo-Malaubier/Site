<?php
//vérifer les injection sql et script
require_once("model/Carte/Carte.php");
require_once("model/Carte/CarteStorage.php");
//INSERT INTO Carte(nom,contenue,Date,attaque,vie) VALUES ('Proten Hulk','when oriteab hulk dues ...','2000-01-01',null,3);

class CarteStorageFileMySQL implements Storage {
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
    $prepar= $this->DB->prepare("SELECT * FROM carte WHERE ID=?");
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
      $prepar= $this->DB->prepare("SELECT * FROM carte WHERE ID=?");
      $prepar->execute([$id]);
      $exist=$prepar->fetch();
      $carte = new Carte($exist["NomCarte"],$exist["ContenueCarte"],$exist["ATT"],$exist["PV"]);
      return $carte;
    }else{
      return null;
    }
  }

  public function readAll(){
    $sql="SELECT * from carte;";
    $request=$this->DB->query($sql);
    $Data=[];

    while ($result = $request->fetch()) {
    //  echo $result['ID'].'. '.$result['NomCarte'].'. '. $result["ContenueCarte"].'. '. $result["Date_Carte"].'. '. $result["PV"].'. '. $result["ATT"]."<br />";
      $Data[$result['ID']] = $result['NomCarte'];
    }
    //var_dump($Data);
    return $Data;
  }

  public function create(Carte $carte){
    $Nom=$carte->getNom();
    $Contenue=$carte->getContenue();
    //$Date=$carte->getDate();
    $Vie=$carte->getVie();
    $Attaque=$carte->getAttaque();

    $prepar=$this->DB->prepare("INSERT INTO carte (NomCarte,ContenueCarte,PV,ATT) VALUES (?,?,?,?); ");

    $prepar->execute([$Nom,$Contenue,$Vie,$Attaque]);
    return $this->DB->lastInsertId(); //return id
  }

  public function delete($id){
    echo($id);
   $prepar=$this->DB->prepare("DELETE FROM carte WHERE ID = ?");
   $prepar->execute([$id]);
}

  public function modif($id,Carte $carte){
    $Nom=$carte->getNom();
    $Contenue=$carte->getContenue();
    //$Date=$carte->getDate();
    $Vie=$carte->getVie();
    $Attaque=$carte->getAttaque();

    $prepar=$this->DB->prepare("UPDATE carte SET NomCarte=?,ContenueCarte=?,PV=?,ATT=? WHERE id=? ");
    $prepar->execute([$Nom,$Contenue,$Vie,$Attaque,$id]);

  }
}
 ?>