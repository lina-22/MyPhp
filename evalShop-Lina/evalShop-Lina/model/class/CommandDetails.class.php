<?php
class CommandDetails{
    private $nom;
    private $prenom;
    private $email;
    private $idClient;
    private $ville;
    private $dateLivraison;
    private $dateCommande;
    private $etat;
    private $articleNom;
    private $prixUnitaire;
    private $estDisponible;

    

    /**
     * Get the value of clNom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of clNom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of clPrenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of idClient
     */ 
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set the value of idClient
     *
     * @return  self
     */ 
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of dateLivraison
     */ 
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    /**
     * Set the value of dateLivraison
     *
     * @return  self
     */ 
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get the value of dateCommande
     */ 
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set the value of dateCommande
     *
     * @return  self
     */ 
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of articleNom
     */ 
    public function getArticleNom()
    {
        return $this->articleNom;
    }

    /**
     * Set the value of articleNom
     *
     * @return  self
     */ 
    public function setArticleNom($articleNom)
    {
        $this->articleNom = $articleNom;

        return $this;
    }

    /**
     * Get the value of prixUnitaire
     */ 
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set the value of prixUnitaire
     *
     * @return  self
     */ 
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * Get the value of estDisponible
     */ 
    public function getEstDisponible()
    {
        return $this->estDisponible;
    }

    /**
     * Set the value of estDisponible
     *
     * @return  self
     */ 
    public function setEstDisponible($estDisponible)
    {
        $this->estDisponible = $estDisponible;

        return $this;
    }
}
