<?php
require_once('php/db.php');
require_once('php/error_management.php');
require_once('php/validSession.php');
require_once("php/UserController.php");

/* controlli sul ruolo dell'utente */
$username = $_SESSION['username'];
$userData = getUser($username);
$userRole = $userData['role'];
if(!isset($username) || $username == '' || $userRole != 1){    // the user is not authorized
    header("location: login.php");
}

$htmlPage = file_get_contents('html/edit_user.html');
require_once('php/full_sec_loader.php');

$usersList = getFullListOfNonAdminUsers();

if(isset($usersList)){
    $selectOptions="";
    foreach($usersList as $user){
        $selectOptions .= "<option value='" . $user['username'] . "'>" . $user['username'] . "</option>";
    }
    $selectbox = "
        <select name='user' id='user'>" .
            $selectOptions
        . "</select>
    ";
}

$output = ' <div class="input-wrapper">
                <label for="user">Select an user</label>'
                . $selectbox . 
            '</div>';

$htmlPage = str_replace("<selectUser/>", $output, $htmlPage);
echo $htmlPage;
?>