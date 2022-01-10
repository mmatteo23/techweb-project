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

// $idInputFrom è l'id nel campo img del form
function checkImageToUpload(&$img, string $target_dir, string $idInputForm, string $img_name){
    if($_FILES[$idInputForm]['name']){
        //$profile_img = basename($_FILES["profile_img"]["name"]);
        $target_file = $target_dir . basename($_FILES[$idInputForm]["name"]);
        //$target_file = $target_dir . $_SESSION['username'] . $imageFileType;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $img = $img_name . "." . $imageFileType;
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        
        $check = getimagesize($_FILES[$idInputForm]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $errors = "<li>File is not an image.</li>";
            $uploadOk = 0;
        }

        // Check if file already exists => NO NOI VOGLIAMO IL REPLACE
        /*
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        */

        // Check file size
        if ($_FILES[$idInputForm]["size"] > 1000000) {
            $errors .= "<li>Sorry, your file is too large.</li>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $errors .= "<li>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</li>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errors .= "<li>Sorry, your file was not uploaded.</li>";
            // if everything is ok, try to upload file
        } else {
            if (!move_uploaded_file($_FILES[$idInputForm]["tmp_name"], $target_dir . $img)) {
                $errors .= "<li>There was an error during profile image uploading.</li>";
            }
        }
    }
    return $errors;
}

?>