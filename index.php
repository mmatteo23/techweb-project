<?php

require_once('php/db.php');
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();
$user_output = "";

if($connection){
    $articles = $db->getTopArticles();
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

$paginaHTML = file_get_contents("html/home.html");

$paginaHTML = str_replace("<AllArticles/>", $user_output, $paginaHTML);

echo $paginaHTML;

?>