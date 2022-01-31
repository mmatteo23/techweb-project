<?php

require_once("php/validSession.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");
require_once('php/error_management.php');

$tags=array();
$articles = getAuthorArticles($_SESSION['username'], $tags);

if(!isset($username) || $username == '' || $userRole != 1){    // the user is not authorized
    header("location: login.php");
}

$user_output = '';

if($articles !== FALSE){ 
    if(count($articles) > 0){
        $user_output .= '<h1>Your Articles</h1><div>';
        $x=0;
        $user_output .= "
            <table class='article-list'>
            <caption>Select one of your articles to get to the edit page where you can update or delete the entire article</caption>
                <thead>
                    <tr>
                        <th scope='col' abbr='id'>Article Id</th>
                        <th scope='col'>Title</th>
                        <th scope='col' abbr='publicated'>Publication Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>";
        foreach($articles as $art){
            $user_output .= "
                <tr id='art-".$art['id']."'>
                    <th scope='row'>".$art['id']."</th>
                    <td>" . $art['title'] . "</td>
                    <td>" . $art['publication_date'] . "</td>
                    <td><a class='action-button pink sh-teal' href='write_article.php?id=" . $art['id'] . "'>Edit</a></td>
                    <td><button class='action-button red sh-teal' onClick='showModal(" . $art['id'] . ")'>Delete</button></td>
                </tr>";
            
        }

        $user_output .= "</tbody></table>"; 
        
        $user_output .= "</div>"; 
    }
    else{
        $user_output .= genericErrorHTML("No articles found", "Looks like you haven't written anything yet", 
                        array("<a href='write_article.php'>Write Something</a>", "If what you're looking for isn't here don't panic yet, there might be a problem with our server"));
    }
}
else{
    $user_output = createDBErrorHTML();
}

$htmlPage = file_get_contents("html/edit_article.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina

$htmlPage = str_replace("<AuthorArticles/>", $user_output, $htmlPage);


echo $htmlPage;

?>