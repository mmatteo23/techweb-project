<?php

require_once('php/db.php');
require_once('php/error_management.php');
require_once('php/UserController.php');
use DB\DBAccess;

session_start();

// paginate the content
// page structure
$htmlPage = file_get_contents('html/login.html');

$profile_img = '<li><p tabindex=-1 id="profile-link" href="login.php" class="nav-active-link"><span aria-hidden="true" class="material-icons md-36">person</span><span>Profile</span></p></li>';
// SHOW USER INFO
if(isset($_SESSION['username'])){
    $user = getUser($_SESSION['username']);
    if($user)
        $profile_img = '<li><p tabindex=-1 id="profile-link" href="profile.php" class="profile-img nav-active-link"><span aria-hidden="true" class="material-icons md-36">person</span><span><img src="images/user_profiles/'. ($user['profile_img']?$user['profile_img']:'default.png') .'" alt="Profile"></span></p></li>';
}

$errors = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){     // Pulsante submit premuto
    $username = $_POST['username'];           // prendo i dati inseriti dall'utente
    $password = $_POST['password'];

    if ($username == '' || $password == ''){
        $errors = "<p class='error'>Username and Password fields are required!</p>";
    } else {
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
}

$htmlPage = str_replace("<formErrors/>", $errors, $htmlPage);

// se l'utente ha già effettuato il login non deve visualizzare questa pagina
if(isset($_SESSION['username']) && $_SESSION['username'] != '') {             
    header("location: profile.php");
}
//str_replace finale col conenuto specifico della pagina
$htmlPage = str_replace('<profile-image/>', $profile_img, $htmlPage);
echo $htmlPage;     // visualizzo la pagina costruita

?>