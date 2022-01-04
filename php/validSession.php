<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['username'] == ''){    // the user is authorized
    header("location: login.php");
}

?>