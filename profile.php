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
    $content = "<div class='profile-hero'><img src='images/user_profiles/" . ($userData['profile_img']?$userData['profile_img']:'default.png') . "' id='user-profile-img' alt='user profile image'>        </div>
        <div class='profile-info'>
            <ul id='user-specs'>
                <li id='user-username'>@" . $userData['username'] . "</li>
                <li><span>Name: </span>" . $userData['firstName'] . " " . $userData['lastName'] . "
                <li><span>Email: </span>" . $userData['email'] . "</li>
                <li><span>Role: </span>" . $role . "</li>
                <li><span>Subscription Date:</span> " . $userData['subscription_date'] . "</li>
            </ul>
            <div class='action-buttons'>
                <button class='action-button red sh-teal' type='button' id='deleteBtn' name='btnDelete' onclick='showModal()'>Delete</button>
                <a href='edit_profile.php' class='action-button purple sh-pink'>Edit</a>
            </div>
        </div>";
}

// paginate the content
// page structure
$htmlPage = file_get_contents("html/profile.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

if ($userData['role'] == 1) {
    $adminButton = '<h3 class="admin-link-info">Admin options:</h3>    
    <div class="action-buttons">
        <a href="write_article.php" class="action-button pink sh-teal">Write article</a>
        <a href="edit_article.php" class="action-button pink sh-teal">Edit articles</a>
        <a href="add_game.php" class="action-button pink sh-teal">Add game</a>
        <a href="edit_game.php" class="action-button pink sh-teal">Edit games</a>            
        <a href="edit_user.php" class="action-button pink sh-teal">Edit users</a>
    </div>';
    $htmlPage = str_replace('<adminButton/>', $adminButton, $htmlPage);
} else if($userData['role'] == 2){
    $adminButton = '
        <h3 class="admin-link-info">Writer options:</h3>
        <div class="action-buttons">
            <a href="write_article.php" class="action-button pink sh-teal">Write article</a>
            <a href="edit_article.php" class="action-button pink sh-teal">Edit articles</a>
        </div>';
    $htmlPage = str_replace('<adminButton/>', $adminButton, $htmlPage);
} else{
    $htmlPage = str_replace('<adminButton/>', '', $htmlPage);
}

echo str_replace('<userInfo/>', $content, $htmlPage);

?>