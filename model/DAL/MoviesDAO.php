<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offres
 *
 * @author 1703728
 */
class MoviesDAO extends Dao
{

    //Récupérer toutes les offres
    public function getAll($recherche)
    //public function getAll()
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT films.idFilm,titre,realisateur,affiche,annee,personnage,nom,prenom FROM films
        JOIN role ON films.idFilm = role.idFilm
        JOIN acteurs ON role.idActeur = acteurs.idActeur WHERE upper(films.titre) LIKE :recherche 
        ORDER BY idFilm" );

        $query->execute(array(':recherche' => "%" . strtoupper($recherche) . "%"));

        $films = array();
        $id = 0;

        while ($data = $query->fetch()) {
            $actor = new Actors(0, $data['nom'], $data['prenom']);
            $role = new Roles(0, $data['personnage'], $actor);

            if ($id != $data['idFilm']) {
                $films[] = new Films($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
                $id = $data['idFilm'];
            }
            $films[count($films) - 1]->add_role($role);
        }
        /* echo "<pre>";
        print_r($newFilm);
        echo "</pre>";  */
        return ($films);

    }

    //Ajouter une offre
    public function add($data)
    {

        $valeurs = ['titre' => $data->gettitre(), 'annee' => $data->getannee(), 'realisateur' => $data->getrealisateur(), 'affiche' => $data->getaffiche()];
        $requete = "INSERT INTO films (titre, annee, realisateur, affiche) VALUES (:titre, :annee, :realisateur, :affiche)";
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
        //if (!$insert->execute(['titre' => $data->gettitre(), 'annee' => $data->getannee(), 'realisateur' => $data->getrealisateur(), 'affiche' => $data->getaffiche()])) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 offre
    public function getOne($idFilm)
    {

        //$query = $this->_bdd->prepare('SELECT * FROM films WHERE films.idFilm = :idFilm')->fetch(PDO::FETCH_ASSOC);
        $query = $this->_bdd->prepare('SELECT * FROM films INNER JOIN role ON films.idFilm = role.idFilm INNER JOIN acteurs ON role.idActeur = acteurs.idActeur WHERE films.idFilm = :idFilm')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':idFilm' => $idFilm));
        $data = $query->fetch();
        $films = new Films($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
        return ($films);
    }

    public function deleteOne($idFilm): int
    {
        $query = $this->_bdd->prepare('SELECT titre FROM films WHERE films.idFilm = :idFilm');
        $query->execute(array(':idFilm' => $idFilm));
        return ($query->rowCount());
    }
}
