<?php
require_once('php/validSession.php');
/*
require_once('php/db.php');
use DB\DBAccess;

// create a connection istance to talk with the db
$connection_manager = new DBAccess();
$conn_ok = $connection_manager->openDBConnection();

$user_data = "";
if($conn_ok){
    $user_data = $connection_manager->checkLogin();     // rispetto a authentication controlla i dati
                                                        // direttamente dalla sessione per verificare
                                                        // se l'utente è verificato
    $connection_manager->closeDBConnection();           // va in errore
}
*/
$htmlPage = file_get_contents("html/private_area.html");

$htmlPage = str_replace('<userName/>', $_SESSION['username'], $htmlPage);

// // page header
// $pageHeader = file_get_contents("html/components/header.html");

// // page footer
// $pageFooter = file_get_contents("html/components/footer.html");

// // replace the placeholders
// $htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
// $htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
echo $htmlPage;

?>