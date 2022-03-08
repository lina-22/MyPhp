<?php
class AdminManager{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO=$unPDO;
    }

    public function fetchAdminByEmailAndMdp($email, $hashMdp)
    {
        try{

       
        $connex=$this->lePDO;
        $sql=$connex->prepare("SELECT * FROM admin where email=:email and mdp=:mdp");
        
        $sql->bindParam(":email",$email);
        $sql->bindParam(":mdp",$hashMdp);
        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_CLASS,"Admin");
        $resultat=$sql->fetch();
        return $resultat;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    }
}
?>
}
?>