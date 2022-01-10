<?php

require_once("php/validSession.php");
require_once("php/ArticleController.php");

$errors = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // POST the comment in db

    // USER input for article
    $title              = $_POST['title'];
    $subtitle           = $_POST['subtitle'];
    $read_time          = $_POST['minutes'];
    $article_text       = $_POST['articleText'];

    // system params for storing an article
    $publication_date   = date('Y-m-d');
    $isApproved         = FALSE;
    $author             = $_SESSION['username'];

    $result = store($title, $subtitle, $article_text, $publication_date, NULL, $read_time, $isApproved, $author);
    if(is_int($result)){
        header("Location: article.php?id=".$result);
    } else {
        $errors = "<ul>" . $result . "</ul>";
    }
}

// paginate the content
// page structure
$htmlPage = file_get_contents("html/write_article.html");

$htmlPage = str_replace('<formErrors/>', $errors, $htmlPage);

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

echo $htmlPage;

?>