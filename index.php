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
    $articles = $db->getTopArticles();
    $tags = $db->getTopArticleTags();
    $MostLiked = $db->getMostLikedArticles();
    $CarouselTags = $db->getCarouselTags($MostLiked);
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
            $user_output .= '</div>
            </article>
            </a>';
        }
    }
    if($MostLiked!=null){
        foreach($MostLiked as $art){
            $HTMLSlide="";
            $HTMLSlide = 
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
            foreach($CarouselTags[$art['id']] as $tag){
                if($intro){
                    $HTMLSlide .= '<ul id="article-tags-home" class="tag-list">';
                    $intro=false;
                }
                $HTMLSlide .= '<li>'.$tag['name'].'</li>';
            }
            if(!$intro)
                $HTMLSlide .= '</ul>';
            $HTMLSlide .= '</div>
                                </article>
                                </a>';
            array_push($slides, $HTMLSlide);
        }
    }
} else {
    $user_output = "<p>Something went wrong while loading the page, try again or contact us.</p>";
}

// impaginarlo
/*
$pageHeader = file_get_contents("html/components/header.html");
$pageFooter = file_get_contents("html/components/footer.html");
$htmlPage = file_get_contents("html/home.html");

$htmlPage = str_replace("<AllArticles/>", $user_output, $htmlPage);
$htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
echo str_replace('<pageFooter/>', $pageFooter, $htmlPage);
*/

$htmlPage = file_get_contents("html/home.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
$htmlPage = str_replace("<AllArticles/>", $user_output, $htmlPage);

//str_replace per il carousel
if(count($slides)>0){
    $carousel='<div class="slider">
                <div class="slides">';
    $i=1;
    foreach($slides as $art){
        if($art!=""){
            $carousel .= '<div id="slide-'.$i.'">'.$art.'</div>';
            $i++;
        }
    }
    $carousel .= '</div></div>';
    $htmlPage = str_replace("<carousel/>", $carousel, $htmlPage);
}
echo $htmlPage;

?>