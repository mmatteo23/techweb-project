<?php

require_once('php/db.php');

session_start();
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();
$user_output = "";
$slides = array();

if($connection){
    $articles = $db->getSearchRelatedArticles($_POST['src_text']);
    $tags = $db->getSearchedArticlesTags();
    $db->closeDBConnection();   //ho finito di usare il db quindi chiudo la connessione
    if($articles!=null){
        foreach($articles as $art){
            $user_output .= 
                '<a class="articleLink" href="article.php?id='.$art['id'].'">
                <article>
                    <div class="article_image">
                        <img src="images/article_covers/'.$art['cover_img'].'"/>
                    </div>
                    <div class="article_info">
                        <h3>'.$art['title'].'</h3>
                        <h4>'.$art['subtitle'].'</h4>
                        <p>'.$art['publication_date'].'</p>';
            $intro=true;
            foreach($tags as $tag){
                if($tag['article_id']==$art['id']){
                    if($intro){
                        $user_output .= '<ul id="article-tags-home" class="tag-list">';
                        $intro=false;
                    }
                    $user_output .= '<li>'.$tag['name'].'</li>';
                }
            }
            if(!$intro)
                $user_output .= '</ul>';
            $user_output .= 
                    '</div>
                </article>
            </a>';
        }
    }
} else {
    $user_output = "<p>Something went wrong while connecting to the database, try again or contact us.</p>";
}

$htmlPage = file_get_contents("html/search.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
$htmlPage = str_replace("<articles/>", $user_output, $htmlPage);


echo $htmlPage;

?>