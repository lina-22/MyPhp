<?php
class ClientManager{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO=$unPDO;
    }

    public function fetchClientByEmailAndMdp($email, $hashMdp)
    {
        try{

       
        $connex=$this->lePDO;
        $sql=$connex->prepare("SELECT * FROM client where email=:email and mdp=:mdp");
        
        $sql->bindParam(":email",$email);
        $sql->bindParam(":mdp",$hashMdp);
        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_CLASS,"Client");
        $resultat=$sql->fetch();
        return $resultat;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    }

    // $resultat=$objetClientManager->createClient($prenom,$nom,$email,$hashedPassword,$address,$ville,$codePostal);
   public function createClient($prenom,$nom,$email,$hashedPassword,$address,$ville,$codePostal){
       try{
           $connex=$this->lePDO;
           $sql = $connex->prepare("INSERT INTO client values(null,:prenom, :nom, :email,:mdp, :adresse, :ville,:codePostal )");
           $sql->bindParam(":prenom",$prenom);
           $sql->bindParam(":nom",$nom);
           $sql->bindParam(":email",$email);
           $sql->bindParam(":mdp",$hashedPassword);
           $sql->bindParam(":adresse",$address);
           $sql->bindParam(":ville",$ville);
           $sql->bindParam(":codePostal",$codePostal);
           $sql->execute();
           var_dump("in call");
           return true;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
           return false;
       }
   }
}

?>