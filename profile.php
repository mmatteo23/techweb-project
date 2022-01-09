<?php
require_once("php/validSession.php");
require_once("php/UserController.php");

// variables
$content = "";  // html code to send to the page

// SHOW USER INFO
$userData = show($_SESSION['username']);

if($userData){
    $content = "<img src='images/user_profiles/" . ($userData['profile_img']?$userData['profile_img']:'default.png') . "' id='user-profile-img' alt='user profile image'>
        <span id='user-username'>" . $userData['username'] . "</span>
        <ul id='user-specs'>
            <li>" . $userData['firstName'] . " " . $userData['lastName'] . "
            <li>Email: " . $userData['email'] . "</li>
            <li>Level: " . $userData['role'] . "</li>
            <li>Subscription Date: " . $userData['subscription_date'] . "</li>
            <li><a href='edit_profile.php'>Edit</a></li>
        </ul>";
}

// paginate the content
// page structure
$htmlPage = file_get_contents("html/profile.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

echo str_replace('<userInfo/>', $content, $htmlPage);

?>