<?php

/* Really necessary ?  */
$userDao = new UserDAO();
$allUsers = $userDao->getAll($_POST);



$message = "";                                              /* Initilizare variabile */
$status = false;
$user = null;



if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password'] && isset($_POST['passconfirm']) && $_POST['passconfirm']) {
    // ^^ Verificare DACA Exista + Daca nu sunt NULL
    
    $email = $_POST['email'];                                           //Mutat posts in variabile
    $psw = $_POST['password'];
    $confirm_psw = $_POST['passconfirm'];

    if (isset($psw) && $psw && isset($confirm_psw) && $confirm_psw) {   // Daca Exista si ≠ NULL
                                                                        

        if ($psw == $confirm_psw) {                                     // Comparatie parola user / parola BDD
            $UsersDao = new UserDAO();                                  // New QUERY prin Prepared Statements
            $newUser = new Users(null, $_POST['email'], password_hash($psw, PASSWORD_ARGON2I));
                                                    // ^^ Functie PHP care verifica 2 parole Hashed
            $status = $UsersDao->add($newUser);                         // Variabila pt. BOOLEAN



/* Messages */
            if ($status) {
                $message = "Your account has been created";
                $user = $newUser;
            } else {
                $message = "The Email Address already exists";
            }
        } else {
            $message = "The passwords need to be the same. Try again!";
        }
    }
} else {
    $message = "";
}


echo $twig->render('register.html.twig', ['status' => $status, 'User' => $user, 'message' => $message]);
