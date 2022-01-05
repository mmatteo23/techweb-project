<?php

namespace DB;

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

	/**************************************************************
	 * 
	 * 						USER MANAGEMENT
	 * 
	 **************************************************************/

	/**
	 * @brief getUserInfo()		returns the user data from username
	 * @return 	array()			if user exists it returns an array with user data
	 * 			NULL			if user doesn't exist it returns null
	 */
	public function getUserInfo(string $username) {
		$query = "SELECT * FROM Person
				WHERE username = '$username' LIMIT 1";
		//echo $query;
		$queryResults = mysqli_query($this->connection, $query) or die("C'è stato un errore! " . mysqli_error($this->connection));
		
		if(mysqli_num_rows($queryResults) == 0) // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return null;

		//$result = array();
		//while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$result = mysqli_fetch_assoc($queryResults);	// abbiamo un solo valore => è sufficiente questa riga
		$queryResults->free(); // libera le risorse
		return $result;
	}

	/**
	 * @brief authentication(string, string)		check if an user with these credentials exists
	 * @return 	TRUE			the user exist 
	 * 			FALSE			the user isn't saved in out server
	 */
	public function authentication(string $username, string $password) {
		$query = "SELECT * FROM Person
				WHERE username = '$username' AND
				password = '$password'";

		$queryResults = mysqli_query($this->connection, $query) or die("Zio culo hai rotto tutto, vai a mangiarti lo smegma! " . mysqli_error($this->connection));
		
		if(mysqli_num_rows($queryResults) == 0) { // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return false;
		}

		$queryResults->free(); // ciao, vola via e vivi la tua vita
		
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

	/**
	 * @brief insertNewUser()		insert new user in Person table
	 * @return 	
	 */
	public function insertNewUser(string $username, string $firstname, string $lastname, string $email, string $password, int $role = 1){
		$today = date("Y-m-d");
		// create the query
		$query = "INSERT INTO Person (username, firstName, lastName, email, password, role, subscription_date)
            VALUES ('$username', '$firstname', '$lastname', '$email', '$password', $role, '$today')";

		// run the query
        return mysqli_query($this->connection, $query); //or die("An error occours! " . mysqli_error($this->connection));
        		
	}

	public function executeQuery(string $query){
		$queryResults = mysqli_query($this->connection, $query) or die("Non è stato possibile recuperare  i dati");
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); // ciao, vola via e vivi la tua vita
		return $result;
	}

	public function getTopArticles(){
		//da Mettere WHERE is_approved e non !is_approved
		$query = "SELECT id, title, subtitle, publication_date, cover_img FROM Article WHERE !is_approved ORDER BY publication_date DESC LIMIT 15";   
		$queryResults = mysqli_query($this->connection, $query) or die("Non è stato possibile recuperare  i dati");
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free();
		return $result;
	}

	public function getTopArticleTags(){
		$query = "SELECT article_id, tag_id, name FROM (article_tags JOIN Article ON article_id=Article.id) JOIN Tag ON tag_id=Tag.id WHERE !is_approved ORDER BY publication_date DESC";   
		$queryResults = mysqli_query($this->connection, $query) or die("Non è stato possibile recuperare  i dati");
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free();
		return $result;
	}

	public function getFavArticles($user){		
		$query = "SELECT id, title, subtitle, publication_date, cover_img FROM Article JOIN saved_articles ON id=article_id WHERE username= '$user' ORDER BY publication_date DESC";   
		$queryResults = mysqli_query($this->connection, $query) or die("Non è stato possibile recuperare  i dati");
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); // ciao, vola via e vivi la tua vita
		return $result;
	}

	public function getMostLikedArticles(){
		$query = "SELECT id, title, subtitle, publication_date, cover_img, COUNT(*) AS numLikes FROM Article JOIN liked_articles ON id=article_id GROUP BY id ORDER BY COUNT(*) DESC LIMIT 4";
		$queryResults = mysqli_query($this->connection, $query) or die("Non è stato possibile recuperare  i dati");
		if(mysqli_num_rows($queryResults)==0){
			return null;
		}
		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		$queryResults->free(); // ciao, vola via e vivi la tua vita
		return $result;
	}

	public function getCarouselTags($articles){
		$result = array();
		foreach($articles as $art){
			$result[$art['id']]=$this->executeQuery('SELECT name FROM Tag JOIN article_tags ON Tag.id = tag_id WHERE article_id = '.$art['id']);
		}
		return $result;
	}

	public function getArticleData($id){
		$query="SELECT * FROM Article WHERE id=".$id;
		$result = $this->executeQuery($query);
		return $result[0];
	}

	public function getArticleTags($id){
		$query = "SELECT name FROM Tag JOIN article_tags ON id=tag_id WHERE article_id=".$id;
		return $this->executeQuery($query);
	}

	/**************************************************************
	 * 
	 * 						GAMES MANAGEMENT
	 * 
	 **************************************************************/

	public function getGames(){
		$query = "SELECT * FROM Game ORDER BY name;";
		$queryResults = mysqli_query($this->connection, $query) or die("C'è stato un errore! " . mysqli_error($this->connection));

		if(mysqli_num_rows($queryResults) == 0) // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return null;

		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		
		$queryResults->free(); // ciao, vola via e vivi la tua vita
		return $result;
	}

	public function getGamesTags(){
		$query = "SELECT * FROM game_genre JOIN Genre
					ON genre_id=id
					ORDER BY game_id;";

		$queryResults = mysqli_query($this->connection, $query) or die("C'è stato un errore! " . mysqli_error($this->connection));

		if(mysqli_num_rows($queryResults) == 0) // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return null;

		$result = array();
		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);
		
		$queryResults->free(); // ciao, vola via e vivi la tua vita
		return $result;
	}
}

?>