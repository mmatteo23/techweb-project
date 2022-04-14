<?php

namespace DB;
use \Datetime;

class DBAccess {
	private const USER = 'root';
	private const PASSWD = 'mariadb';
	private const HOST = '127.0.0.1';
	private const DATABASE = 'mariadb';
	private const PORT = '3306';

	private $connection;

	public function openDBConnection() {
		$this->connection = mysqli_connect(DBAccess::HOST, 
										   DBAccess::USER, 
										   DBAccess::PASSWD,
										   DBAccess::DATABASE);
		if(mysqli_errno($this->connection)){
			return false;
		} else {
			return true;
		}
	}

	public function closeDBConnection() {
		mysqli_close($this->connection);
	}

	public function escape_string(string $str) {
		return mysqli_real_escape_string($this->connection, $str);
	}

	/*****************************************************************
	 * 
	 * 	ATTENZIONE!!! MODIFICARE PRIMA DI METTERE IN PRODUZIONE
	 * 
	 ****************************************************************/
	/**
	 * @brief executeQuery(string)	it executes the passed query and return the result
	 * @return key/id				INSERT: returns the id/key that identifies the created record.
	 * @return array()				SELECT:	returns an array with the db records extracted
	 * @return TRUE					UPDATE/DELETE: the query updates the record successfully
	 * @return FALSE				default: the query was wrong								 
	 * 
	 ****************************************************************/
	public function executeQuery(string $query){
		
		$queryResult = mysqli_query($this->connection, $query);

		if($queryResult){
			if(mysqli_insert_id($this->connection))			// INSERT QUERY
				return mysqli_insert_id($this->connection);

			if($queryResult === TRUE){ // UPDATE o DELETE
				return TRUE;
			}

			// SELECT
			$result = array();
			while($row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC)){
				array_push($result, $row);
			}
			$queryResult->free();
			return $result;
		}
		return $queryResult;	// FALSE => Query failed

		/*	OLD QUERY
		
		if(!$queryResults){
			//return "WrongQuery";
			return FALSE;
		}
		// Different query => different result to return
		// INSERT
		//echo "<p>" . $query . "</p>";
		if(mysqli_insert_id($this->connection)){
			return mysqli_insert_id($this->connection);
		} elseif($queryResults === TRUE){
			return true;
		} elseif(mysqli_num_rows($queryResults)==0){	// QUERY FAILED or no results
			return NULL;
		}

		// DEFAULT case: multiple records
		
		$result = array();
		//while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		
		while($row = mysqli_fetch_array($queryResults, MYSQLI_ASSOC)){
			array_push($result, $row);
		}
		$queryResults->free();
		return $result;
		*/
	}

	/**************************************************************
	 * 
	 * 						USER MANAGEMENT
	 * 
	 **************************************************************/


	/**
	 * @brief authentication(string, string)		check if an user with these credentials exists
	 * @return 	TRUE			the user exist 
	 * 			FALSE			the user isn't saved in out server
	 */
	public function authentication(string $username, string $password) {
		$query = "SELECT * FROM Person
				WHERE username = '$username' AND
				password = '$password'";

		$queryResults = mysqli_query($this->connection, $query); 
		if(!$queryResults)
			return false;
		
		if(mysqli_num_rows($queryResults) == 0) { // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return false;
		}

		$queryResults->free(); 
		
		return true;
	}

	/**
	 * @brief checkLogin()		check if the user is authorized (it has passed the login phase)
	 * @return 	array()			if user has passed the login
	 * 			redirect		if the user isn't authorized redirect to login page
	 */
	public function checkLogin(){
		if(isset($_SESSION['username'])){
			$sessionUsername = $_SESSION['username'];
			$query = "SELECT * FROM Person WHERE username = '$sessionUsername' LIMIT 1";

			$result = mysqli_query($this->connection, $query);
			if($result && mysqli_num_rows($result) > 0){
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}

		// redirect to login
		header("Location: login.php");
		die;
	}


	public function getFavArticles($user){		
		$query = "SELECT Article.id AS id, title, subtitle, publication_date, cover_img, Game.name AS game, alt_cover_img FROM (Article JOIN saved_articles ON id=article_id) JOIN Game ON game_id=Game.id WHERE username= '$user' ORDER BY publication_date DESC, id DESC";   
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); 
		return $result;
	}
	
	public function getFavArticlesTags($user){
		$query = "SELECT saved_articles.article_id, tag_id, name FROM (article_tags JOIN Article ON article_id=Article.id) JOIN Tag ON tag_id=Tag.id JOIN saved_articles ON Article.id=saved_articles.article_id WHERE username='$user' ORDER BY publication_date DESC, saved_articles.article_id DESC";   
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); 
		return $result;
	}
	
	public function getArticleData($id){
		$query="SELECT Article.id AS id, title, subtitle, text, publication_date, author, read_time, Game.name AS name, cover_img, alt_cover_img FROM Article JOIN Game on game_id = Game.id WHERE Article.id=".$id;
		$result = $this->executeQuery($query);
		if($result)
			return $result[0];
		else
			return NULL;
	}

	public function getArticleTags($id){
		$query = "SELECT name FROM Tag JOIN article_tags ON id=tag_id WHERE article_id=".$id;
		return $this->executeQuery($query);
	}

	public function getNumberOfLikes($id){
		$query = "SELECT COUNT(*) AS likes_number FROM liked_articles WHERE article_id=".$id;
		$result = $this->executeQuery($query);
		return $result[0]['likes_number'];
	}

	public function getSearchRelatedArticles($src_text){
		if($src_text=='')
			return null;
		$src_text = urldecode($src_text);
		$query1 = "CREATE OR REPLACE VIEW SearchRelatedArticles AS 
		(SELECT Article.id AS id, title, subtitle, Tag.name, publication_date, cover_img, Game.name AS game, alt_cover_img FROM 
		((article_tags JOIN Article ON article_id=Article.id) JOIN Tag ON tag_id=Tag.id) JOIN Game on game_id=Game.id
		WHERE (
		title LIKE '%$src_text%' OR
		subtitle LIKE '%$src_text%' OR
		text LIKE '%$src_text%' OR
		Tag.name IN (SELECT Tag.name as Tname FROM (article_tags JOIN Article ON article_id=Article.id) JOIN Tag ON tag_id=Tag.id WHERE Tag.name LIKE '%$src_text%'))
		GROUP BY title
		ORDER BY publication_date DESC, id DESC)";
		$queryResults = mysqli_query($this->connection, $query1);
		if(!$queryResults)
			return null;
		$query2 = "SELECT * FROM SearchRelatedArticles";
		$queryResults = mysqli_query($this->connection, $query2);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); 
		return $result;
	}

	public function getSearchRelatedArticlesTags(){
		$query = "SELECT SearchRelatedArticles.id AS id, Tag.name AS tag, publication_date FROM (SearchRelatedArticles JOIN article_tags ON id=article_id) JOIN Tag ON tag_id=Tag.id ORDER BY publication_date DESC, id DESC";
		$results = $this->executeQuery($query);
		return $results;
	}
	
	public function getSelectedGameArticles($game){
		if($game=='')
			return null;
		$game = urldecode($game);
		$query1 = "CREATE OR REPLACE VIEW SearchRelatedArticles AS 
		(SELECT Article.id AS id, title, subtitle, Game.name AS game, publication_date, cover_img, alt_cover_img FROM Article JOIN Game ON game_id=Game.id
		WHERE Game.name='$game'
		GROUP BY title
		ORDER BY publication_date DESC, id DESC)";
		$queryResults = mysqli_query($this->connection, $query1);
		if(!$queryResults)
			return null;
		$query2 = "SELECT * FROM SearchRelatedArticles";
		$queryResults = mysqli_query($this->connection, $query2);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); 
		return $result;
	}
	public function getSelectedTagArticles($tag){
		if($tag=='')
			return null;
		$tag = urldecode($tag);
		$query1 = "CREATE OR REPLACE VIEW SearchRelatedArticles AS 
		(SELECT Article.id AS id, title, subtitle, publication_date, cover_img, Game.name AS game, alt_cover_img FROM 
		((Article JOIN article_tags ON id=article_id) JOIN Tag on Tag.id = tag_id) JOIN Game on game_id=Game.id
		WHERE Tag.name='$tag' ORDER BY publication_date DESC, id DESC)";
		$queryResults = mysqli_query($this->connection, $query1);
		if(!$queryResults)
			return null;
		$query2 = "SELECT * FROM SearchRelatedArticles";
		$queryResults = mysqli_query($this->connection, $query2);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); 
		return $result;
	}

	/**************************************************************
	 * 
	 * 						GAMES MANAGEMENT
	 * 
	 **************************************************************/

	public function getGames(){
		$query = "SELECT * FROM Game ORDER BY name;";
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults)
			return "ErroreDB";

		if(mysqli_num_rows($queryResults) == 0) // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return null;

		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		
		$queryResults->free(); 
		return $result;
	}

	public function getGamesTags(){
		$query = "SELECT game_id, Genre.name FROM (game_genre JOIN Genre ON genre_id=id) JOIN Game ON game_id = Game.id
					ORDER BY Game.name;";

		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults) == 0) // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return null;

		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		
		$queryResults->free(); 
		return $result;
	}

	public function getUserLikedArticle($username, $article_id) {
		$query = "SELECT username FROM liked_articles WHERE article_id=$article_id AND username=\"$username\"";
		$result = $this->executeQuery($query);
		if(!$result)
			return false;
		return $username == $result[0]['username'];
	}

	public function getUserSavedArticle($username, $article_id) {
		$query = "SELECT username FROM saved_articles WHERE article_id=$article_id AND username=\"$username\"";
		$result = $this->executeQuery($query);
		if(!$result)
			return false;
		return $username == $result[0]['username'];
	}


	/**************************************************************
	 * 
	 * 						HOME MANAGEMENT
	 * 
	 **************************************************************/


	public function getTopArticles(int $nArt, int $offset = 0){
        $query = "SELECT Article.id AS id, title, subtitle, publication_date, cover_img, Game.name AS game, alt_cover_img FROM Article JOIN Game ON game_id=Game.id ORDER BY publication_date DESC, id DESC LIMIT ".$nArt." OFFSET ".$offset;   
        $queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults) 
			return "ErroreDB";
        if(mysqli_num_rows($queryResults)==0){
            return null;
        }
        $result = array();
        while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
        $queryResults->free();
        return $result;
    }

	public function getTopArticleTags(int $nArt, int $offset = 0){
		$query1 = "CREATE OR REPLACE VIEW topArticles AS (SELECT id FROM Article ORDER BY publication_date DESC, id DESC LIMIT ".$nArt." OFFSET ".$offset.")";
		$query2 = "SELECT article_id, tag_id, name FROM (article_tags JOIN topArticles ON article_id=topArticles.id) JOIN Tag ON tag_id=Tag.id";   
		mysqli_query($this->connection, $query1);
		$queryResults = mysqli_query($this->connection, $query2);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free();
		return $result;
	}

	public function getMostLikedArticles(){
		$today = new DateTime(date("Y-m-d"));
		$sixMonthsAgo = ($today->modify('-6 months'))->format("Y-m-d");	//articoli negli ultimi sei mesi solo perchè è un sito per un progetto - se fosse un vero sito di notizie sarebbe meglio un mese o due settimane
		$query = "SELECT Article.id AS id, title, subtitle, publication_date, cover_img, COUNT(*) AS numLikes, Game.name AS game, alt_cover_img FROM (Article JOIN liked_articles ON id=article_id) JOIN Game ON game_id=Game.id WHERE publication_date>'$sixMonthsAgo' GROUP BY Article.id ORDER BY COUNT(*) DESC LIMIT 4";
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults)
			return null;
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); 
		return $result;
	}

	public function getCarouselTags($articles){
		$result = array();
		foreach($articles as $art){
			$result[$art['id']]=$this->executeQuery('SELECT name FROM Tag JOIN article_tags ON Tag.id = tag_id WHERE article_id = '.$art['id']);
		}
		return $result;
	}

	public function getHotGames() {
		$today = new DateTime(date("Y-m-d"));
		$sixMonthsAgo = ($today->modify('-6 months'))->format("Y-m-d");	//articoli negli ultimi sei mesi solo perchè è un sito per un progetto - se fosse un vero sito di notizie sarebbe meglio un mese o due settimane
		$query2 = "SELECT Game.id as id, Game.name as name, Game.game_img as img, COUNT(*) AS numLikes 
		FROM (liked_articles JOIN Article on article_id=id) JOIN Game on game_id = Game.id
		WHERE publication_date>'$sixMonthsAgo' GROUP BY game_id ORDER BY COUNT(*) DESC LIMIT 4";
		$result = $this->executeQuery($query2);
		return $result;
	}

	public function LikeArticle($username, $id){
		$query = 'INSERT INTO liked_articles VALUES("'.$username.'",'.$id.');';
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults) 
			return "Non è stato possibile aggiungere il like";
	}

	public function UnlikeArticle($username, $id){
		$query = 'DELETE FROM liked_articles WHERE username="'.$username.'" AND article_id='.$id;
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults)
			return "Non è stato possibile togliere il like";
	}

	public function SaveArticle($username, $id){
		$query = 'INSERT INTO saved_articles VALUES("'.$username.'",'.$id.');';
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults)
			return "Non è stato possibile aggiungere il preferito";
	}

	public function UnsaveArticle($username, $id){
		$query = 'DELETE FROM saved_articles WHERE username="'.$username.'" AND article_id='.$id;
		$queryResults = mysqli_query($this->connection, $query);
		if(!$queryResults) 
			return "Non è stato possibile togliere il preferito";
	}
}

?>