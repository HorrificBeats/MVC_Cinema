<?php


$offresDao = new MoviesDAO();                           //New DAO OBJECT 


$recherche = null;                                      // Initializare variabile
$message = "";
$status = false;


$allFilms = $offresDao->getAll($recherche);             // Apel functie getAll cu parametru $recherche 
                                                        // Este NECESAR ? 




if (isset($_POST['titre']) && $_POST['titre'] && isset($_POST['annee']) && $_POST['annee'] && isset($_POST['realisateur']) && $_POST['realisateur'] && isset($_POST['affiche']) && $_POST['affiche']) {
    // DACA
    
    $titre = $_POST['titre'];                           // Mutat POST in variabile
    $realisateur = $_POST['realisateur'];;              //
    $affiche = $_POST['affiche'];                       //
    $annee = $_POST['annee'];                           //


    $MoviesDao = new MoviesDAO();                       // New DAO Object
    $newFilm = new Films(null, $_POST['titre'], $_POST['affiche'], $_POST['realisateur'], $_POST['annee']);
            // New Films OBJECT (null = ca sa nu afectez indexarea automata din SQL)

    //DEBUGGING      
    /* echo "<pre>";
    print_r($newFilm);
    echo "</pre>";  */

    

    $status = $MoviesDao->add($newFilm);                // Verificare cu $status

    //var_dump($status);
    //print $status;


    if ($status) {
        $message = "The MOVIE has been added!";
    } else {
        $message = "The MOVIE could not be added!";
    }
} else {                                                // trebuie testat sa vad daca are vruen rost
    $message = "";
}


if (isset($_SESSION['user'])) {                         // Verificare SESSION pt. a permite accesul doar user-ilor conectati
    echo $twig->render('addMovie.html.twig', ['message' => $message]);
    // Render de template + mutat ce am scris in $message pt fiecare caz din If / Else
} else {
    echo $twig->render('erreur.html.twig', ['erreur' => 'You are not logged in boi']);
            // Render de template ERROR + specificare ^^ a mesajului afisat
                                            // 'Teleport A'
}
