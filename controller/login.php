<?php

//require_once("/Applications/MAMP/htdocs/MVC_Cinema/model/DAL/UserDAO.php");


//On affiche le template Twig correspondant
//echo $twig->render('login.html.twig');

//On appelle la fonction getAll()
/* $userDao = new UserDAO();

$allUsers = $userDao->getAll();

$allUsers = array(); */


/* if (isset($_POST['email']) && $_POST['email']) {
    if (isset($_POST['password']) && $_POST['password']) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $connectDAO = new UserDAO();
        $connexion = $connectDAO->connexion_user($email);

        $correct_password = password_verify($password, $connexion->getPassword());

        //var_dump($correct_password);

        if ($correct_password == false) {

            $message = "Email ou mot de passe incorrect !";
        } elseif ($correct_password == true) {

            $_SESSION['user'] = $email;
            header('location:films');
        }
    }
} */


//Incercare COD KEVIN
$message = "";              //Initializare variabila (cred?)
$passwordCorrect = true;    // ** State default pt $variabila


//CONNECT
if (isset($_POST['email']) && $_POST['email']) {
    // DACA ^^ Exista + Nu e NULL
    if (isset($_POST['password']) && $_POST['password']) {
        // DACA ^^ Exista + Nu e NULL
        $email = $_POST['email'];                   // Transfer de date din $_POST 
        $password = $_POST['password'];             // in $variabile 

        $connexionDAO = new UserDAO();                          //  Creare de new Object UserDAO
        // Transfer intr-o $variabila
        $connexion = $connexionDAO->connexion_user($email);     //Apel METHOD din UserDAO.php

        if ($connexion) {                                       // * Daca $variabila reuseste query-ul ( ?? )
            $passwordCorrect = password_verify($password, $connexion->getPassword());
            // ^^ $variabila primeste date din ^^ unde se verifica doua psw hashed (din INPUT/$_Post, respectiv din BDD)

            if ($passwordCorrect == false) {                    // ** Daca password_verify() da cu FAIL                                              
                $message = 'Wrong email/password';                    // ** raspuns
            } else {                                            // ** Daca NU aka ^^  REUSESTE 
                $_SESSION['user'] = $email;                     // ** Trimite $email spre $_SESSION     ( mai exact ? )                    
                header('location:movies');                      // ** Trimitere spre HOME Page
            }
        } else {
            $message = 'Wrong email/password';                           // * Daca NU aka $connexion da fail

            // Mesajele "Wrong password" si "Wrong email" trebuie 'mascate' pt. ca hackerii sa nu stie exact ce se tinteasca 
        }
    }
}








echo $twig->render('login.html.twig', ['message' => $message]);







//Boolean verification of USER
/* if ($_POST) {
    if ($findUser == false) {
        echo "User not found ";
    } else {
        echo "User found ";
    }
} */

//Boolean verification of PASSWORD
/* if ($_POST) {
    if ($passwordOk == false) {
        echo "Password not found";
    } else {
        echo "Password found";
    }
} */

//Boolean verification of USER + PASSWORD
/* if ($_POST) {
    if ($findUser == true && $passwordOk == true) {
        echo "All good chief";
    } else {
        echo "Try Again! ";
    }
} */
