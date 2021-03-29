<?php

// Initialisation de l'environnement
include './config/config.init.php'; //locatia fisierului de configurare

include _CTRL_ . 'header.php';  //Integrare HEADER

// Gestion de Routing
if (isset($_GET['action']) && file_exists(_CTRL_ . $_GET['action'] . '.php')) {
    include _CTRL_ . $_GET['action'] . '.php';
    //^^ separa NUMELE file de EXTENSIA lui
} elseif (isset($_GET['action']) && !file_exists(_CTRL_ . $_GET['action'] . '.php')) {
    include _CTRL_ . 'erreur.php';
} else {
    include _CTRL_ . 'movies.php';
}

include _CTRL_ . 'footer.php'; //Integrare footer
?>