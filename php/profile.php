<?php

require_once('db.php');
use DB\DBAccess;

// create a connection istance to talk with the db
$connction_manager = new DBAccess();
$conn_ok = $connction_manager->openDBConnection();

// variables
$user = "";
$user_output = "";  // html code to send to the page

if($conn_ok){
    $user = $connction_manager->getUserInfo($_GET['username']);
    $connction_manager->closeDBConnection();
    if($user != null){  // the user exists
        //echo print_r($user);
        $user = $user[0];
        $phpdate = strtotime( $user['subscription_date'] );
        $mysqldate = date( 'Y-m-d', $phpdate );
        //echo "\n" . $mysqldate;
        $user_output = "<img src='../images/user_profiles/0001.jpg' id='user-profile-img' alt='user profile image'>
        <span id='user-username'>" . $user['username'] . "</span>
        <ul id='user-specs'>
            <li>Email: " . $user['email'] . "</li>
            <li>Level: " . $user['role'] . "</li>
            <li>Subscription Date: " . $mysqldate . "</li>
        </ul>";
    } else {
        $user_output = "<p>This user doesn't exist in our server. Try later or contact us.</p>";
    }
}

// paginate the content

$htmlPage = file_get_contents("../profile.html");

echo str_replace('<userInfo/>', $user_output, $htmlPage);

?>