<?php

require_once('utilityFunctions.php');
require_once('validSession.php');
require_once('db.php');
use DB\DBAccess;

$htmlPage = file_get_contents("../html/profile.html");


// // page header
// $pageHeader = file_get_contents("html/components/header.html");

// // page footer
// $pageFooter = file_get_contents("html/components/footer.html");

// // replace the placeholders
// $htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
// $htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);


//header footer and dynamic navbar all at once
//require_once('full_sec_loader.php');

$errors = '';

// check if the user press the submit button
if($_SERVER['REQUEST_METHOD'] == "POST"){

    // take the data
    $username       = $_SESSION['username'];
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $rep_password   = $_POST['repeated_password'];
    $image          = $_FILES['profile_img']['name'];   // ['name in form']['imported file name']

    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok){

        $errors = validateUserData($connection_manager, $username, $firstname, $lastname, $email, $password, $rep_password, FALSE);
        if(!$errors){
            // if the username is valid
            if(!empty($image)){
                $tmpName = $_FILES['profile_img']['tmp_name'];
                $uploadPath = "../images/user_profiles/";
                move_uploaded_file($tmpName, $uploadPath.$image);
            }
            //echo $image;
            $result = $connection_manager->updateUserInfo($username, $firstname, $lastname, $email, $password, $image);
            
            if($result){
                //echo "creazione utente";
                $connection_manager->closeDBConnection();
                //header('location: ../profile.php');
                redirect('../profile.php', false, 201);
            }
        }
    } else {
        $errors = "<p>Our services are down at this moment, please try later or contact us</p>";
    }
}

// inserisce la lista degli errori o elimina il tag dalla pagina
//$htmlPage = str_replace("<formErrors/>", $errors, $htmlPage);
if($errors != '')
    //echo $errors;
    redirect("../profile.php?firstname=$firstname&lastname=$lastname&email=$email&errors=$errors", false, 301);

?>