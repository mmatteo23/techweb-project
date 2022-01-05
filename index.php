<?php

require_once('php/db.php');

session_start();
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();
$user_output = "";

if($connection){
    $articles = $db->getTopArticles();
    $db->closeDBConnection();   //ho finito di usare il db quindi chiudo la connessione
    if($articles!=null){
        foreach($articles as $art){
            $user_output .= 
                '<article>
                    <div class="article_image">
                        <img src="images/article_covers/'.$art['cover_img'].'"/>
                    </div>
                    <div class="article_info">
                        <h3>'.$art['title'].'</h3>
                        <h4>'.$art['subtitle'].'</h4>
                        <p>'.$art['publication_date'].'</p>
                    </div>
                </article>';
                //
                //////MANCANO I TAG HEHE 
                /*  <ul id="article-tags-home" class="tag-list">
                        <li>Pronto</li>
                        <li>Il</li>
                        <li>Liscio</li>
                    </ul>*/
                //
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
echo str_replace("<AllArticles/>", $user_output, $htmlPage);
?>