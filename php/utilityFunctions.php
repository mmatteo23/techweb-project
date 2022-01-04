<?php

function validateNewUserData ($conn, string $username, string $firstname, string $lastname, string $email, string $password, string $password2) {
    // Verify that the user is unique in db
    $errors = '';
    
    if($conn->getUserInfo($username)){    // there is an user with the same username
        $errors .= "<li>An user with this username already exists, please change it and retry.</li>";
    }
    
    if($firstname === ''){
        $errors .= "<li>The firstname is required</li>";
    }

    if($lastname === ''){
        $errors .= "<li>The lastname is required</li>";
    }

    if($email === ''){
        $errors .= "<li>E-mail is required</li>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= "<li>The e-mail format is invalid</li>";
    }

    if($password === ''){
        $errors .= "<li>The password is required</li>";
    } else if(strlen($password) < 4) {
        $errors .= "<li>The password need to be at least 4 characters long</li>";
    }

    if($password2 === ''){
        $errors .= "<li>Please confirm your password</li>";
    } else if($password != $password2) {
        $errors .= "<li>The passwords don't match</li>";
    }

    if($errors != ''){
        $errors = substr_replace($errors, "<ul>", 0, 0);
        $errors .= "</ul>";
    }

    return $errors;
}

?>