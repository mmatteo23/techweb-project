<?php
require_once("php/validSession.php");
require_once("php/utilityFunctions.php");
require_once("php/UserController.php");

// variables
$content = "";  // html code to send to the page
$errors = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // take the data
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $rep_password   = $_POST['repeated_password'];
    $profile_img    = NULL;
    // ['name in form']['imported file name']

        $check = getimagesize($_FILES["profile_img"]["tmp_name"]);
    $errorsImage = checkImageToUpload($profile_img);
    
    if(!$errors){
        $result = update($_SESSION['username'], $firstname, $lastname, $email, $password, $rep_password, $profile_img);
        if($result === TRUE){
            redirect('../profile.php', false, 201);
        } else {
            $errors = $result;
        }
    }

}

// TAKE OLD USER INFO
$oldUserData = show($_SESSION['username']);

$content = "
    <div class='form-wrapper' id='profileEditForm'>
        <h1 id='page-title'>Edit profile</h1>
            <formErrors/>
            <form action='edit_profile.php' method='POST' enctype='multipart/form-data' id='form'>
                <div class='input-wrapper'>
                    <img src='images/user_profiles/" . ($oldUserData['profile_img']?$oldUserData['profile_img']:'default.png') . "' id='user-profile-img' alt='user profile image'>
                    <input type='file' id='profile_img' class='custom-file-input' name='profile_img'>
                    <p class='error'></p>
                </div>
                <div class='input-wrapper'>
                    <label for='username'>username</label>
                    <input placeholder='username' type='text' id='username' name='username' value='" . $oldUserData['username'] . "' disabled>
                    <p class='error'></p>
                </div>
                <div class='input-wrapper'>
                    <label for='firstname'>firstname</label>
                    <input placeholder='Jack' type='text' id='firstname' name='firstname' value='" . $oldUserData["firstName"] . "'>
                    <p class='error'></p>
                </div>
                <div class='input-wrapper'>
                    <label for='lastname'>lastname</label>
                    <input placeholder='Red' type='text' id='lastname' name='lastname' value='" . $oldUserData["lastName"] . "'>
                    <p class='error'></p>
                </div>                
                <div class='input-wrapper'>
                    <label for='email'>email</label>
                    <input placeholder='jackred@email.com' type='text' id='email' name='email' value='" . $oldUserData["email"] . "'>
                    <p class='error'></p>
                </div>
                <div class='input-wrapper'>
                    <label for='password'>password</label>
                    <input type='password' name='password' id='password'>
                    <p class='error'></p>
                </div>
                <div class='input-wrapper'>
                    <label for='repeated_password'>repeat password</label>
                    <input type='password' name='repeated_password' id='repeated_password'>
                    <p class='error'></p>
                </div>
                <div id='btnBlock' class='form-buttons'>
                    <a class='edit-profile-btn action-button' href='profile.php' id='undoBtn'>Discard</a>
                    <input id='submit-btn' class='edit-profile-btn action-button' type='submit' id='saveBtn' value='Update'>
                </div>
            </form>
        </div>";


// paginate the content
// page structure
$htmlPage = file_get_contents("html/edit_profile.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

$htmlPage = str_replace('<editForm/>', $content, $htmlPage);
$htmlPage = str_replace('<formErrors/>', $errors, $htmlPage);

echo $htmlPage;

?>