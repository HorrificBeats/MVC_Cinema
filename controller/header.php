<?php
//On affiche le template Twig correspondant

if (isset($_SESSION['user'])) {
    // Verific daca EXISTA + Nu este NULL $_SESSION, ca sa stiu daca User-ul este logat sau nu
    echo $twig->render('header.html.twig', ['Login' => 'Disconnect', 'action' => 'logout', 'disparition' => 'display:block;' , 'disparitionRev' => 'display:none;']);
    // 'printez' pagina cu twig
    // Folosesc PLACEHOLDERS / Variabile twig, ca sa schimb lucruri prin HTML; ca un teleport unde statia B este intre "{{ teleportB }}"
                                //e.g. {{Login}} devine {{Disconnect}}, 
                                                                //{{action}} (in HREF) devine Logout, care cu Autoloader navigheaza spre 'Logout.php'
                                                                            //{{disparition}} sta intr-un 'style' unde devine 'd-block' ca sa Arate butonul

} else {
    echo $twig->render('header.html.twig', ['Login' => 'Login', 'action' => 'login', 'disparition' => 'display:none;', 'disparitionRev' => 'display:block;']);
} 




//echo var_dump($_SESSION);
