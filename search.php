<?php

require_once('php/db.php');
require_once('php/error_management.php');

session_start();
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();
$user_output = "";
$slides = array();
$dynamicBreadcrumb="";
$tags="";


if($connection){
    if(isset($_GET['tag']) || isset($_GET['src_text']) || isset($_GET['game'])){
        if(isset($_GET['src_text'])){
            $articles = $db->getSearchRelatedArticles($_GET['src_text']);
            $dynamicBreadcrumb=': articles containing "'.$_GET['src_text'].'"';
        }
        else if(isset($_GET['tag'])){
            $articles = $db->getSelectedTagArticles($_GET['tag']);
            //$tags = $db->getSelectedTagArticles($_GET['tag']);
            $dynamicBreadcrumb=': articles with tag "'.$_GET['tag'].'"';
        }
        else if(isset($_GET['game'])){
            $articles = $db->getSelectedGameArticles($_GET['game']);
            //$tags = $db->getSelectedGameArticles($_GET['game']);
            $dynamicBreadcrumb=': articles about "'.$_GET['game'].'"';
        }
        $tags = $db->getSearchRelatedArticlesTags($_GET['src_text']);
        $db->closeDBConnection();   //ho finito di usare il db quindi chiudo la connessione
        if($articles){
            $user_output .= '<section id="search-results"><h1>Search results</h1>';
            $x=0;
            foreach($articles as $art){
                $user_output .= 
                    '<a class="card-article-link" href="article.php?id='.$art['id'].'">
                    <article>
                        <div class="card-article-image">
                            <img src="images/article_covers/'.$art['cover_img'].'" alt="' . $art['alt_cover_img'] . '"/>
                        </div>
                        <div class="card-article-info">
                            <h3>'.$art['title'].'</h3>
                            <h4>'.$art['subtitle'].'</h4>
                            <p>'.$art['publication_date'].'</p>';
                $user_output .= '<ul class="tag-list card-article-tags">
                                    <li class="tag game-tag">'.$art['game'].'</li>';
                if($tags){
                    while(isset($tags[$x]) && $tags[$x]['id']==$art['id']){
                        $user_output .= '<li class="tag">'.$tags[$x]['tag'].'</li>';
                        $x++;
                    }
                }   
                $user_output .= '</ul>';
                $user_output .= '</div>
                </article>
                </a>';
            }      
            $user_output .= "</section>";  
        }else{
            $user_output .= genericErrorHTML("Zero matches found", "No article includes what you're looking for.", 
                            array("Change the search input.", "Refresh the page, it might just be that easy.", "Visit our other pages."));
        }
    }else{
        $user_output .= genericErrorHTML("The URL seems to be missing something", "Looks like something went wrong.", 
                        array("Refresh the page, it might just be that easy.", "Visit our other pages."));
    }
} else {
    $user_output = createDBErrorHTML();
}

$htmlPage = file_get_contents("html/search.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina

$htmlPage = str_replace("<DynamicBreadCrumb/>", $dynamicBreadcrumb, $htmlPage);
$htmlPage = str_replace("<search_results/>", $user_output, $htmlPage);


echo $htmlPage;

?>