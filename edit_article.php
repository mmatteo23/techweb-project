<?php

require_once("php/validSession.php");
require_once("php/ArticleController.php");
require_once("php/UserController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");
require_once('php/error_management.php');

$tags=array();
$username = $_SESSION['username'];
$userData = getUser($username);

if ($userData['role'] == 1) {
    $articles = getAllArticles();
} else {
    $articles = getAuthorArticles($username, $tags);
}

if(!isset($username) || $username === '' || $userData['role'] > 2){    // the user is not authorized
    header("location: login.php");
}

$user_output = '';

if($articles !== FALSE){ 
    if(count($articles) > 0){

        // create paginator
        $per_page_record = 10;
        $total_pages = ceil(count($articles) / $per_page_record);
        $pageLink = '';
        $pageController = '';
        $page = $_GET['page'];

        if(!isset($page) || $page == NULL) $page = 1;
        if($page > $total_pages) $page = $total_pages;

        if($page >= 2) $pageController .= "<a href='edit_article.php?page=". ($page-1) ."'><abbr title='Previous'>Prev</abbr></a>";
        /*
        for($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {   
                $pageController .= "<span class = 'active'>".$i." </span>";   
            }               
            else {   
                $pageController .= "<a href='edit_article.php?page=".$i."'>".$i." </a>";     
            }   
        };
        */
        $pageController .= "<span>".$page." of ". $total_pages ."</span>";

        if($page<$total_pages){   
            $pageController .= "<a href='edit_article.php?page=".($page+1)."'>Next</a>";   
        }

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
        for($j=(($page-1)*($per_page_record)); $j<$page*($per_page_record); $j++){
            if($articles[$j])
                $user_output .= "
                    <tr id='art-".$articles[$j]['id']."'>
                        <th scope='row'>".$articles[$j]['id']."</th>
                        <td>" . $articles[$j]['title'] . "</td>
                        <td>" . $articles[$j]['publication_date'] . "</td>
                        <td><a href='write_article.php?id=" . $articles[$j]['id'] . "'><i class='material-icons' aria-hidden='true'>edit</i></a><a class='action-button pink sh-teal' href='write_article.php?id=" . $articles[$j]['id'] . "'>Edit</a></td>
                        <td><button class='delete-btn' onClick='showModal(" . $articles[$j]['id'] . ")'><i class='material-icons' aria-hidden='true'>delete</i></button><button class='action-button red sh-teal' onClick='showModal(" . $articles[$j]['id'] . ")'>Delete</button></td>
                </tr>";
        }
        /*
        foreach($articles as $art){
            $user_output .= "
                <tr id='art-".$art['id']."'>
                    <th scope='row' abbr='article number ".$art['id']."'>".$art['id']."</th>
                    <td>" . $art['title'] . "</td>
                    <td>" . $art['publication_date'] . "</td>
                    <td><a href='write_article.php?id=" . $art['id'] . "'><i class='material-icons' aria-hidden='true'>edit</i></a><a class='action-button pink sh-teal' href='write_article.php?id=" . $art['id'] . "'>Edit</a></td>
                    <td><button class='delete-btn' onClick='showModal(" . $art['id'] . ")'><i class='material-icons' aria-hidden='true'>delete</i></button><button class='action-button red sh-teal' onClick='showModal(" . $art['id'] . ")'>Delete</button></td>
                </tr>";
            
        }
        */

        $user_output .= "</tbody></table>"; 
        
        $user_output .= "</div>";

        if($total_pages > 1)
            $user_output .= "<div class='pagination'>" . $pageController . "</div>";
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