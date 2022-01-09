<?php

function validateUserData ($conn, string $username, string $firstname, string $lastname, string $email, string $password, string $password2, bool $new = true) {
    // Verify that the user is unique in db
    $errors = '';

    if($new && $conn->getUserInfo($username)){    // there is an user with the same username
        $errors .= "<li class='error'>An user with this username already exists, please change it and retry.</li>";
    }
    
    if($firstname === ''){
        $errors .= "<li class='error'>The firstname is required</li>";
    }

    if($lastname === ''){
        $errors .= "<li class='error'>The lastname is required</li>";
    }

    if($email === ''){
        $errors .= "<li class='error'>E-mail is required</li>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= "<li class='error'>The e-mail format is invalid</li>";
    }

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

function redirect($url, $statusCode = 200)
{
   header('location: ' . $url, false, $statusCode);
   die();
}

function buildError(string $msg){
    return "<li class='error'>" . $msg . "</li>";
}

function checkImageToUpload(){
    
}

?>