<?php
require_once('php/utilityFunctions.php');
require_once('php/db.php');
use DB\DBAccess;

$htmlPage = file_get_contents("html/signup.html");

// page header
$pageHeader = file_get_contents("html/components/header.html");

// page footer
$pageFooter = file_get_contents("html/components/footer.html");

// replace the template placeholders
$htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
$htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

$errors = '';

// check if the user press the submit button
if($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();

    // take the data
    $username       = $_POST['username'];
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $rep_password   = $_POST['repeated_password'];

    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok){

        $errors = validateNewUserData($connection_manager, $username, $firstname, $lastname, $email, $password, $rep_password);

        if(!$errors){
            // if the username is valid 
            if($connection_manager->insertNewUser($username, $firstname, $lastname, $email, $password)){
                $connection_manager->closeDBConnection();
                
                $_SESSION['username'] = $username;
                //echo "utente creato";
                header("location: private_area.php");
            }
        }
    } else {
        $errors = "<p>Our services are down at this moment, please try later or contact us</p>";
    }
}

// inserisce la lista degli errori o elimina il tag dalla pagina
$htmlPage = str_replace("<formErrors/>", $errors, $htmlPage);

// se l'utente ha già effettuato il login non deve visualizzare questa pagina
if($_SESSION['username']) {             
    header("location: private_area.php");
}

echo $htmlPage;

?>