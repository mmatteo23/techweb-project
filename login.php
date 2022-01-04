<?php

require_once('php/db.php');
use DB\DBAccess;

// paginate the content
// page structure
$htmlPage = file_get_contents('html/login.html');

// page header
$pageHeader = file_get_contents("html/components/header.html");

// page footer
$pageFooter = file_get_contents("html/components/footer.html");

// replace the template placeholders
$htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
$htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

if($_SERVER['REQUEST_METHOD'] == "POST"){     // Pulsante submit premuto
    session_start();
    $username = $_POST['username'];           // prendo i dati inseriti dall'utente
    $password = $_POST['password'];

    // Controlli meglio gestirli lato client => JAVASCRIPT
    $errors = "";

    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok){
        $isValid = $connection_manager->authentication($username, $password);
        $connection_manager->closeDBConnection();

        if($isValid){  // utente trovato
            $_SESSION['username'] = $username;
        } else {    // utente non registrato o credenziali errate
            $errors = "<ul>
            <li>
                Your credentials are wrong!
            </li>
            </ul>";
        }

    } else {
        $errors = "<p>Our services are down for a moment, please try later or contact us</p>";
    }
    
}

if(isset($errors)){
    $htmlPage = str_replace("<formErrors/>", $errors, $htmlPage);
} 

if($_SESSION['username']) {             // se l'utente ha già effettuato il login non deve visualizzare questa pagina
    header("location: private_area.php");
}

echo $htmlPage;     // visualizzo la pagina costruita

?>