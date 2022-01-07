<?php
require_once('utilityFunctions.php');
require_once('php/db.php');
use DB\DBAccess;

// MAIN FUNCTIONS
function show(string $username){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    // Take the user from DB
    $user = $connection_manager->getUserInfo($username);
    // Close the connection after the query
    $connection_manager->closeDBConnection();

    // if the user exists
    if($conn_ok && ($user != null)){  
        return $user;
    }

    return NULL;
}

function update(string $username, string $firstname, string $lastname, string $email, string $password, string $rep_password, $profile_img){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok){

        $errors = validateUserData($connection_manager, $username, $firstname, $lastname, $email, $password, $rep_password, FALSE);
        if(!$errors){
            // if the username is valid

            // Image check
            /*
            if(!empty($image)){
                $tmpName = $_FILES['profile_img']['tmp_name'];
                $uploadPath = "../images/user_profiles/";
                move_uploaded_file($tmpName, $uploadPath.$image);
            }
            */
            //echo $image;
            $result = $connection_manager->updateUserInfo($username, $firstname, $lastname, $email, $password, $profile_img);
            
            return $result;
        } else {
            return $errors;
        }
    }

    return false;
}

?>