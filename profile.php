<?php
session_start();
require_once('php/db.php');
use DB\DBAccess;

// create a connection istance to talk with the db
$connection_manager = new DBAccess();
$conn_ok = $connection_manager->openDBConnection();

// variables
$user = "";
$user_output = "";  // html code to send to the page


if(isset($_SESSION['username'])){
    if($conn_ok && $_SESSION['username']){
        $user = $connection_manager->getUserInfo($_SESSION['username']);
        $connection_manager->closeDBConnection();
        if($user != null){  // the user exists
            //echo print_r($user);
            $user_output = "<img src='images/user_profiles/" . ($user['profile_img']?$user['profile_img']:'default.png') . "' id='user-profile-img' alt='user profile image'>
            <span id='user-username'>" . $user['username'] . "</span>
            <ul id='user-specs'>
                <li>Email: " . $user['email'] . "</li>
                <li>Level: " . $user['role'] . "</li>
                <li>Subscription Date: " . $user['subscription_date'] . "</li>
            </ul>";
        }
    } else {
        $user_output = "<p>This user doesn't exist in our server. Try later or contact us.</p>";
    }
} else{
    header ('location: login.php');
}


// paginate the content
// page structure
$htmlPage = file_get_contents("html/profile.html");

// // page header
// $pageHeader = file_get_contents("html/components/header.html");

// // page footer
// $pageFooter = file_get_contents("html/components/footer.html");

// // replace the placeholders
// $htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
// $htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

echo str_replace('<userInfo/>', $user_output, $htmlPage);

?>