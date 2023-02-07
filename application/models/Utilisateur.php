<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateur extends CI_Model
{
    private $idutilisateur;
    private $nom;
    private $mail;
    private $motdepasse;
    private $isAdmin;

    public function __construct($idutilisateur, $nom, $mail, $motdepasse, $isAdmin){
        $this->setIdutilisateur($idutilisateur);
        $this->setNom($nom);
        $this->setMail($mail);
        $this->setMotdepasse($motdepasse);
        $this->setIsAdmin($isAdmin);
    }

    /**
     * Get the value of idutilisateur
     */ 
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set the value of idutilisateur
     *
     * @return  self
     */ 
    public function setIdutilisateur($idutilisateur)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of motdepasse
     */ 
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * Set the value of motdepasse
     *
     * @return  self
     */ 
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    /**
     * Get the value of isAdmin
     */ 
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @return  self
     */ 
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }
}

?>