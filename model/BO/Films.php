<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offres
 *
 * @author Vince
 */
class Films
{

    private $idFilm;
    private $titre;
    private $realisateur;
    private $affiche;
    private $annee;
    //Singura modalitate de a gestiona asta;
    // daca o initializam, atunci fiecare Film TREBUIE sa aiba un ROLL
    private $roles = array();

    public function __construct($idFilm, $titre, $realisateur, $affiche, $annee, $roles = array())
    // L-am pus in NULL pt. a nu crea obligatia ca fiecare obiect nou sa aiba roluri
    {
        $this->idFilm = $idFilm;
        $this->titre = $titre;
        $this->realisateur = $realisateur;
        $this->affiche = $affiche;
        $this->annee = $annee;
        $this->roles = $roles ;
    }

    public function add_role($role)
    {
        $this->roles[] = $role;
    }


    // GETTER 
    public function idFilm()
    {
        return $this->idFilm;
    }

    public function gettitre()
    {
        return $this->titre;
    }

    public function getrealisateur()
    {
        return $this->realisateur;
    }

    public function getaffiche()
    {
        return $this->affiche;
    }

    public function getannee()
    {
        return $this->annee;
    }

    public function getRoles()
    {
        return $this->roles;
    }



    // SETTERS 
    public function setidFilm($idFilm)
    {
        $this->idFilm = $idFilm;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }

    public function set_realisateur($realisateur)
    {
        $this->realisateur = $realisateur;
    }

    public function set_affiche($affiche)
    {
        $this->affiche = $affiche;
    }

    public function set_annee($annee)
    {
        $this->annee = $annee;
    }
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }
}
