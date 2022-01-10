<?php
//to be placed in every main php file to render header, dynamic navbar and footer
require_once('php/db.php');
use DB\DBAccess;
// variables

$profile_class = "";  // html code to send to the page

// create a connection istance to talk with the db
$connection_manager = new DBAccess();
$conn_ok = $connection_manager->openDBConnection();

$profile_img = '<li><a tabindex=7 id="profile-link" href="login.php" ><span class="material-icons md-36">person</span><span>Profile</span></a></li>';

if($conn_ok && isset($_SESSION['username'])){
    $user = $connection_manager->getUserInfo($_SESSION['username']);
    $connection_manager->closeDBConnection();
    if($user!="ErroreDB")
        $profile_img = '<li><a tabindex=7 id="profile-link" href="profile.php" class="profile-img" ><span class="material-icons md-36">person</span><span><img src="images/user_profiles/'. ($user['profile_img']?$user['profile_img']:'default.png') .'" alt="Profile"></span></a></li>';
}

// page header
$pageHeader = file_get_contents("html/components/header.html");

// page footer
$pageFooter = file_get_contents("html/components/footer.html");

// replace the placeholders
$pageHeader = str_replace('<profile-image/>', $profile_img, $pageHeader);
$htmlPage =  str_replace('<pageHeader/>', $pageHeader, $htmlPage);
$htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

?>