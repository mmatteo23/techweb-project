<?php
//to be placed in every main php file to render header, dynamic navbar and footer
require_once('php/UserController.php');
// variables

$profile_class = "";  // html code to send to the page


$profile_img = '<li><a tabindex="7" id="profile-link" href="login.php" ><span aria-hidden="true" class="material-icons md-36">person</span><span>Profile</span></a></li>';

if(isset($_SESSION['username'])){
    $user = getUser($_SESSION['username']);
    if($user)
        $profile_img = '<li><a tabindex="7" id="profile-link" href="profile.php" class="profile-img" ><span aria-hidden="true" class="material-icons md-36">person</span><span><img src="images/user_profiles/'. ($user['profile_img']?$user['profile_img']:'default.png') .'" alt="Profile"></span></a></li>';
}

// page header
$pageHeader = file_get_contents("html/components/header.html");

// page footer
$pageFooter = file_get_contents("html/components/footer.html");

// replace the placeholders
$htmlPage =  str_replace('<pageHeader/>', $pageHeader, $htmlPage);
$htmlPage = str_replace('<profile-image/>', $profile_img, $htmlPage);
$htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

?>