<?php
/* Obs. Acest CONTROLLER nu are nevoie de o pagina HTML/Twig; */
/*  */


$message = "";                  //Initializare variabila (cred?)
$passwordCorrect = true;        // ** State default pt $variabila / Pregatire boolean



//DISCONNECT
    //^^ Verificam ca $_GET['disconnect'] EXISTA si ^^ ca are valoarea TRUE
    unset($_SESSION['user']);                   // DELETES the value inside $_SESSION['username]
    //setcookie("user",NULL,0);
    session_destroy();                          // Doar regenereaza SESIUNEA (nu e necesar aici ? )
    header('location:login');                   // Trimitere inapoi spre LOGIN




                                        /* Extrase din exercitii mai vechi */    


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
