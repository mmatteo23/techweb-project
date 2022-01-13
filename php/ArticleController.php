<?php

require_once('utilityFunctions.php');
require_once('db.php');
require_once('TagController.php');
require_once('UserController.php');
use DB\DBAccess;


function getArticleData(int $id, string $author, array &$tags){
    
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        $selectQuery = "SELECT Article.id AS id, Game.name AS game, publication_date, cover_img, title, subtitle, read_time, text FROM Article JOIN Game ON game_id=Game.id WHERE author = '$author' AND Article.id=".$id;
        $articles = $connection_manager->executeQuery($selectQuery);
        $tagQuery = "SELECT Article.id AS id, Tag.name AS tag FROM (Article JOIN article_tags ON id=article_id) JOIN Tag ON tag_id=Tag.id WHERE author = '$author' AND Article.id=".$id;
        $tags = $connection_manager->executeQuery($tagQuery);
        
        $connection_manager->closeDBConnection();
        
        if($articles)
            return $articles[0];
    }
    $connection_manager->closeDBConnection();

    return false;
}

function getAuthorArticles(string $author, array &$tags){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        $selectQuery = "SELECT Article.id AS id, Game.name AS game, publication_date, cover_img, title, subtitle FROM Article JOIN Game ON game_id=Game.id WHERE author = '$author' ORDER BY publication_date DESC";

        $articles = $connection_manager->executeQuery($selectQuery);
        $tagQuery = "SELECT Article.id AS id, Tag.name AS tag FROM (Article JOIN article_tags ON id=article_id) JOIN Tag ON tag_id=Tag.id WHERE author = '$author' ORDER BY publication_date DESC";
        $tags = $connection_manager->executeQuery($tagQuery);
        
        $connection_manager->closeDBConnection();
        
        if($articles != 'WrongQuery')
            return $articles;
    } else {
        $connection_manager->closeDBConnection();
        return buildError("Internal server error");
    }

    return false;
}


function articleValidator($title, $subtitle, $article_text, $publication_date, $cover_img, $read_time){
    $errors = "";

    if($title == '')
        $errors .= buildError('Title is required');

    if($subtitle == '')
        $errors .= buildError('Subtitle is required');

    if($article_text == '')
        $errors .= buildError('Article text is required');
    elseif(strlen(strip_tags($article_text)) < 100)
        $errors .= buildError('Article text must be at least 100 characters long');
    
    if($read_time <= 0)
        $errors .= buildError('Read time need to be a positive value');

    return $errors;
}

function linkTags(int $articleId, string $tags){
    $formTags = explode(';',$tags);
    
    manageTags($formTags);

    linkArticleTags($articleId, $formTags);
}

function linkArticleTags(int $articleId, array $tags){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        $selectQuery = "
            SELECT id FROM Tag
            WHERE
        ";

        foreach($tags as $tag){
            $selectQuery .= " name = '$tag' OR";
        }

        $selectQuery = trim($selectQuery, 'OR');

        $tagIds = $connection_manager->executeQuery($selectQuery);

        $insertQuery = "INSERT INTO article_tags VALUES";

        foreach($tagIds as $tag){
            $insertQuery .= "(" . $tag['id'] . ", $articleId),";
        }

        $insertQuery = trim($insertQuery, ',');

        $connection_manager->executeQuery($insertQuery);
        $connection_manager->closeDBConnection();
    }

}

function deleteArticleById(int $id){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        $deleteQuery1 = "DELETE FROM article_tags WHERE article_id=".$id; 
        $deleteQuery2 = "DELETE FROM Article WHERE id=".$id;
        $connection_manager->executeQuery($deleteQuery1);
        $connection_manager->executeQuery($deleteQuery2);
        $connection_manager->closeDBConnection();
    }
}

function storeArticle(string $title, string $subtitle, string $article_text, string $publication_date, string $cover_img, string $read_time, string $author, int $game_id, string $tags, int $id=0){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        if(getUser($author)){      // this is a valid author

            $validationErrors = articleValidator($title, $subtitle, $article_text, $publication_date, $cover_img, $read_time);
            
            $title = $connection_manager->escape_string($title);
            $subtitle = $connection_manager->escape_string($subtitle);
            $article_text = $connection_manager->escape_string($article_text);

            if(!$validationErrors){
                if($id!=0){
                    $insertQuery = "
                    INSERT INTO Article (id, title, subtitle, text, publication_date, cover_img, read_time, author, game_id)
                    VALUES ($id, '$title', '$subtitle', '$article_text', '$publication_date', '$cover_img', $read_time, '$author', $game_id)
                    ";
                }
                else{
                    $insertQuery = "
                        INSERT INTO Article (title, subtitle, text, publication_date, cover_img, read_time, author, game_id)
                        VALUES ('$title', '$subtitle', '$article_text', '$publication_date', '$cover_img', $read_time, '$author', $game_id)
                    ";
                }
                
                $articleId = $connection_manager->executeQuery($insertQuery);
                //$articleId = 15;
                $connection_manager->closeDBConnection();
                if($articleId != 'WrongQuery'){
                    if($tags) linkTags($articleId, $tags);
                    return $articleId;
                } else
                    return buildError("There was an error during the insert of the article");
            }

            $connection_manager->closeDBConnection();
            return $validationErrors;

        } else {
            $connection_manager->closeDBConnection();
            return buildError("This user can't write articles");
        }
    } else {
        $connection_manager->closeDBConnection();
        return buildError("Internal server error");
    }
}


?>