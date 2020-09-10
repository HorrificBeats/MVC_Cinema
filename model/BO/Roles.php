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
class Roles
{

    private $idRole;
    private $personnage;
    private $actor;


    public function __construct($idRole = 0, $personnage, Actors $actor = null)
    // cerem variabila                                       ^^ din clasa 'Actors'
    {
        $this->idRole = $idRole;
        $this->personnage = $personnage;
        $this->actor = $actor;
    }

    public function getidRole()
    {
        return $this->idRole;
    }

    public function setidRole($idRole)
    {
        $this->idRole = $idRole;
    }


    public function getPersonnage()
    {
        return $this->personnage;
    }

    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;
    }

    public function getActor()
    {
        return $this->actor;
    }

    public function setActor($actor)
    {
        $this->actor = $actor;
    }

    public function add_role($role) {
        $this->role[] = $role;
    }
}
