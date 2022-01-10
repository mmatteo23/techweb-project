<?php

require_once('php/db.php');
use DB\DBAccess;

session_start();

// paginate the content
// page structure
$htmlPage = file_get_contents('html/login.html');

// // page header
// $pageHeader = file_get_contents("html/components/header.html");

// // page footer
// $pageFooter = file_get_contents("html/components/footer.html");

// // replace the template placeholders
// $htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
// $htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

$errors = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){     // Pulsante submit premuto
    $username = $_POST['username'];           // prendo i dati inseriti dall'utente
    $password = $_POST['password'];

    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok){
        $isValid = $connection_manager->authentication($username, $password);
        $connection_manager->closeDBConnection();

        if($isValid){  // utente trovato
            $_SESSION['username'] = $username;
        } else {    // utente non registrato o credenziali errate
            $errors = "<p class='error'>
                Your credentials are wrong!
            </p>";
        }

    } else {
        $errors = createDBErrorHTML();
    }
    
}

$htmlPage = str_replace("<formErrors/>", $errors, $htmlPage);

// se l'utente ha già effettuato il login non deve visualizzare questa pagina
if(isset($_SESSION['username']) && $_SESSION['username'] != '') {             
    header("location: private_area.php");
}

//str_replace finale col conenuto specifico della pagina
echo $htmlPage;     // visualizzo la pagina costruita

?>