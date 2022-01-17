<?php
require_once("php/validSession.php");
require_once("php/utilityFunctions.php");
require_once("php/UserController.php");

// variables
$content = "";  // html code to send to the page
$errors = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if (isset($_POST['btnDelete'])) {
        //echo "DELETE";
        deleteUser($_SESSION['username']);
        header('Location: index.php');
    } else {
        
        // take the data
        $firstname      = $_POST['firstname'];
        $lastname       = $_POST['lastname'];
        $email          = $_POST['email'];
        $password       = $_POST['password'];
        $rep_password   = $_POST['repeated_password'];
        $profile_img    = NULL;
        // ['name in form']['imported file name']
    
        
        if($errors==""){
            $result = updateUser($_SESSION['username'], $firstname, $lastname, $email, $password, $rep_password, $profile_img);
            if($result === TRUE){
                $errors .= checkImageToUpload($profile_img, "images/user_profiles/", "profile_img", $_SESSION['username'], "Default.png");
                if(!$errors)
                    header("Location: profile.php");
            }
            $errors .= $result;
        }
    }

}

// TAKE OLD USER INFO
$oldUserData = getUser($_SESSION['username']);

$content = "
    <div class='form-wrapper' id='profileEditForm'>
        <h1 id='page-title'>Edit profile</h1>
        <formErrors/>
        <form action='edit_profile.php' method='POST' enctype='multipart/form-data' id='form'>
            <div class='input-wrapper'>
                <label for='profile_img'>
                    <img src='images/user_profiles/" . ($oldUserData['profile_img']?$oldUserData['profile_img']:'default.png') . "' id='user-profile-img' alt='user profile image'>
                    Your picture<br>
                    <span>Max file size 2<abbr title='megabyte'>MB</abbr></span>
                </label>
                <input type='file' accept='image/png,image/jpeg,image/bmp' id='profile_img' class='custom-file-input' name='profile_img' onchange='showPreview(event);'>
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
                <a class='edit-profile-btn action-button pink discard' href='profile.php' id='undoBtn'>Discard</a>
                <input class='edit-profile-btn action-button purple' type='submit' id='saveBtn' name='btnUpdate' value='Update'>
            </div>
        </form>
    </div>";


// paginate the content
// page structure
$htmlPage = file_get_contents("html/edit_profile.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

$htmlPage = str_replace('<editForm/>', $content, $htmlPage);
if ($errors=='')
    $htmlPage = str_replace('<formErrors/>', '', $htmlPage);
else
    $htmlPage = str_replace('<formErrors/>', '<ul id="errorUL">'.$errors.'</ul>', $htmlPage);

echo $htmlPage;

?>