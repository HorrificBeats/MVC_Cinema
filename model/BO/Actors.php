<?php

class Actors
{

    private $idActeur;
    private $nom;
    private $prenom;

    public function __construct($idActeur, $nom, $prenom)
    {
        $this->idFilm = $idActeur;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function getidActeur()
    {
        return $this->idActeur;
    }

    public function setidActeur($idActeur)
    {
        $this->idActeur = $idActeur;
    }


    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
}
