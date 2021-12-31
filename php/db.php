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

	public function getUserInfo(string $username) {
		$query = "SELECT * FROM Person
				WHERE username = '$username'";
		//echo $query;
		$queryResults = mysqli_query($this->connection, $query) or die("Zio culo hai rotto tutto, vai a mangiarti lo smegma! " . mysqli_error($this->connection));
		
		if(mysqli_num_rows($queryResults) == 0) // usare gli if in modo efficiente, la cpu elabora velocemente i branch positivi, perché in caso di ramo else deve fare il rollback di quello che ha fatto e prendere l'altro ramo => mettere in esito positivo sempre i rami che sono piú probabili!
			return null;

		$result = array();

		while($row = mysqli_fetch_assoc($queryResults)) array_push($result, $row);

		$queryResults->free(); // ciao, vola via e vivi la tua vita
		return $result;

	}
}

?>