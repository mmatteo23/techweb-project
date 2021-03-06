<?php
require_once('utilityFunctions.php');
require_once('db.php');
use DB\DBAccess;

/**
 * @brief getUserData()		returns the user data from username
 * @return 	array()			if user exists it returns an array with user data
 * @return  NULL			if user doesn't exist it returns null
 */
function getUser(string $username) {
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok){
        $query = "SELECT * FROM Person
                WHERE username = '$username' LIMIT 1";

        $queryResults = $connection_manager->executeQuery($query); 
        $connection_manager->closeDBConnection();
        if(isset($queryResults[0]['username']))
            return $queryResults[0];
        return false;
    }
}

function validateUserData (string &$username, string &$firstname, string &$lastname, string &$email, string $password, string $password2, string &$errors) {
    
    $inputs = [&$username, &$firstname, &$lastname, &$email];
    foreach($inputs as &$stringhetta)
        $stringhetta=htmlspecialchars($stringhetta);

    if(!preventMaliciousCode($username))
        $errors .= buildError("The username field seems to be containing unacceptable input, if this isn't the case contact us");

    if($firstname === '')
        $errors .= "<li class='error'>The firstname is required</li>";
    else if(!preventMaliciousCode($firstname))
        $errors .= buildError("The first name field seems to be containing unacceptable input, if this isn't the case contact us");

    if($lastname === '')
        $errors .= "<li class='error'>The lastname is required</li>";
    else if(!preventMaliciousCode($lastname))
        $errors .= buildError("The last name field seems to be containing unacceptable input, if this isn't the case contact us");

    if($email === ''){
        $errors .= "<li class='error'>E-mail is required</li>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= "<li class='error'>The e-mail format is invalid</li>";
    }
    else if(!preventMaliciousCode($email))
        $errors .= buildError("The email field seems to be containing unacceptable input, if this isn't the case contact us");

    if($password === ''){
        $errors .= "<li class='error'>The password is required</li>";
    } else if(strlen($password) < 4) {
        $errors .= "<li class='error'>The password need to be at least 4 characters long</li>";
    }

    if($password2 === ''){
        $errors .= "<li class='error'>Please confirm your password</li>";
    } else if($password != $password2) {
        $errors .= "<li class='error'>The passwords don't match</li>";
    }

    if($errors != ''){
        $errors = substr_replace($errors, "<ul class='error-list'>", 0, 0);
        $errors .= "</ul>";
    }

    return $errors;
}


/**
 * @brief insertNewUser()		insert new user in Person table
 * @return TRUE                 the user is correctly created
 * @return FALSE                there was an error during the creation process
 */
function insertNewUser(string $username, string $firstname, string $lastname, string $email, string $password, string $password2, string &$errors, int $role = 2){
    $today = date("Y-m-d");
    // create the query
    $insertQuery = "INSERT INTO Person (username, firstName, lastName, email, password, role, subscription_date)
        VALUES ('$username', '$firstname', '$lastname', '$email', '$password', $role, '$today')";
    
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    // Verify that the user is unique in db
    if($new && getUserData($username)){    // there is an user with the same username
        $errors .= "<li class='error'>An user with this username already exists, please change it and retry.</li>";
    }   
    if($conn_ok){
        validateUserData($username, $firstname, $lastname, $email, $password, $password2, $errors);
        if($errors=="")
            $results = $connection_manager->executeQuery($insertQuery);
        $connection_manager->closeDBConnection();
        if($results){
            return true;
        }
        return false;
    }         
}

function updateUserInfo($username, $firstname, $lastname, $email, $password, $image){
    $updateQuery = "UPDATE Person
    SET	firstName='$firstname', lastName='$lastname', email='$email', password='$password'";
    if($image){
        $updateQuery .= ", profile_img='$image'";
    }
    $updateQuery .= " WHERE username='$username'";
    $queryResult = mysqli_query($this->connection, $updateQuery);
    if(!$queryResults)
        return "UpdateFailed";
    return $queryResult;
}


function updateUser(string $username, string $firstname, string $lastname, string $email, string $password, string $rep_password, $profile_img){
    // create a connection istance to talk with the db
    $errors="";
    validateUserData($username, $firstname, $lastname, $email, $password, $rep_password, $errors);
    if(!$errors){
        $connection_manager = new DBAccess();
        $conn_ok = $connection_manager->openDBConnection();
        if($conn_ok){
            $updateQuery = "UPDATE Person
            SET	firstName='$firstname', lastName='$lastname', email='$email', password='$password'";
            if($profile_img && $profile_img != ""){
                $updateQuery .= ", profile_img='$profile_img'";
            }
            $updateQuery .= " WHERE username='$username'";

            $queryResult = $connection_manager->executeQuery($updateQuery);
            $connection_manager->closeDBConnection();
            if(!$queryResult){
                return "<li>Error during user update</li>";
            }
            return true;
        }
        else{
            header("Location: error.php");
        }
    } else {
        return $errors;
    }
}

function deleteUser(string $username){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    if($conn_ok){
        $deleteQuery = "DELETE FROM Person WHERE username = '$username'";
        $result = $connection_manager->executeQuery($deleteQuery);
        $connection_manager->closeDBConnection();
        return $result;
    } else {
        header("Location: error.php");
    }
}

function getFullListOfNonAdminUsers(){
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    if($conn_ok){
        $query = "SELECT * FROM Person WHERE role >= 2";
        $result = $connection_manager->executeQuery($query);
        $connection_manager->closeDBConnection();
        return $result;
    } else {
        header("Location: error.php");
    }
}


function getProfileImageOf($username){
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    if($conn_ok){
        $query = "SELECT profile_img FROM Person WHERE username='$username'";
        $result = $connection_manager->executeQuery($query);
        $connection_manager->closeDBConnection();
        if(!$result)
            return false;
        return $result[0]['profile_img'];
    }
}
?>
