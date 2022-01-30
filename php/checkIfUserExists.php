<?php

require_once('UserController.php');

$username = $_POST['newUserName'];

$result = getUser($username);

if ($result === false) {
    echo false;
} else {
    echo true;
}

?>