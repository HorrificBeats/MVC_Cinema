<?php
// Obs. Magia e in HTML/Twig

//On appelle la fonction getAll()                            // Functie ABSTRACTA (care e caun 'contract')

$moviesDao = new MoviesDAO();                                // NEW MoviesDAO object (care a mostenit functiile, atributele Clasei DAO)



if (isset($_POST['recherche'])) {
// DACA ^^ Exista ? ^^
    $allFilms = $moviesDao->getAll($_POST['recherche']);    // Cautam in BDD input-ul userului
} else {
    $allFilms = $moviesDao->getAll('');                     // Daca NU, las vid fieldul (''), ca sa apare TOTUL
}




//On affiche le template Twig correspondant

echo $twig->render('movies.html.twig', ['allFilms' => $allFilms]);          
                                        // Nu inteleg ce fac acesti parametrii
