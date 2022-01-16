<?php
require_once("php/validSession.php");
require_once("php/UserController.php");

// variables
$content = "";  // html code to send to the page

// SHOW USER INFO
$userData = getUser($_SESSION['username']);

if($userData){
    $role="";
    switch($userData['role']){
        case 1: $role = 'Admin';break;
        case 2: $role = 'Writer';break;
        case 3: $role = 'User';break;
    }
    $content = "<img src='images/user_profiles/" . ($userData['profile_img']?$userData['profile_img']:'default.png') . "' id='user-profile-img' alt='user profile image'>
        <span id='user-username'>" . $userData['username'] . "</span>
        <ul id='user-specs'>
            <li>" . $userData['firstName'] . " " . $userData['lastName'] . "
            <li>Email: " . $userData['email'] . "</li>
            <li>Role: " . $role . "</li>
            <li>Subscription Date: " . $userData['subscription_date'] . "</li>
        </ul>";
}

// paginate the content
// page structure
$htmlPage = file_get_contents("html/profile.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

if ($userData['role'] == 1) {
    $adminButton = '<h3 class="admin-link-info">Click the link below to get to the administration page:</h3>    
    <a href="administration.php" class="action-button pink sh-teal center">Manage site</a>';
    $htmlPage = str_replace('<adminButton/>', $adminButton, $htmlPage);
} else if($userData['role'] == 2){
    $adminButton = '
        <div class="action-buttons">
            <a href="write_article.php" class="action-button">Write article</a>
            <a href="edit_article.php" class="action-button">Edit articles</a>
        </div>';
    $htmlPage = str_replace('<adminButton/>', $adminButton, $htmlPage);
} else{
    $htmlPage = str_replace('<adminButton/>', '', $htmlPage);
}

echo str_replace('<userInfo/>', $content, $htmlPage);

?>