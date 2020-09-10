<?php


class UserDAO extends Dao
{

    //Récupérer toutes les offres
    public function getAll($recherche)
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT user.idUser, user.email, user.password FROM user");
        $query->execute();
        $users = array();

        while ($data = $query->fetch()) {
            $users[] = new Users($data['idUser'], $data['email'], $data['password']);
        }
        return ($users);
    }

    //ADD a USER
    public function add($data)
    {

        $valeurs = ['email' => $data->getEmail(), 'password' => $data->getPassword()];

        //vérification email
        $requete_verif = $this->_bdd->prepare('SELECT email FROM user WHERE email= :email');
        $requete_verif->execute(array(':email' => $data->getEmail()));

        $compteur = $requete_verif->rowCount();
        if ($compteur < 1) {
            $requete = 'INSERT INTO user (email, password) VALUES (:email , :password)';
            $insert = $this->_bdd->prepare($requete);
            if (!$insert->execute($valeurs)) {
                //print_r($insert->errorInfo());
                return false;
            } else {
                return true;
            }
        }
        /*$requete = 'INSERT INTO user (email, password) VALUES (:email , :password)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }*/
    }

    //Récupérer plus d'info sur 1 offre
    public function getOne($idUser)
    {

        $query = $this->_bdd->prepare('SELECT * FROM user WHERE user.idUser = :idUser')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':idUser' => $idUser));
        $data = $query->fetch();
        $offer = new Users($data['idUser'], $data['email'], $data['password']);
        return ($offer);
    }


    public function deleteOne($idUser): int
    {
        $query = $this->_bdd->prepare('DELETE FROM user WHERE user.idUser = :idUser');
        $query->execute(array(':idUser' => $idUser));
        return ($query->rowCount());
    }

    //Récupérer les infos sur la bdd pour la connexion user
    public function connexion_user($email)
    {
        $req = $this->_bdd->prepare('SELECT idUser, email, password FROM user WHERE email = :email');
        $req->execute(array('email' => $email));
        $data = $req->fetch();
        
        if ($data) {
        $user = new Users($data['idUser'], $data['email'], $data['password']);
        return ($user);
        }

        

        
    }
}
