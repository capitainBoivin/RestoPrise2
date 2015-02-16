<?php
	require_once("actions/CommonAction.php");
	require_once("Connection.php");

	class CommonConnection{
		private static $connection;

		public static function loginUser($courriel,$pwd){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM CLIENT WHERE COURRIEL=? AND MDP =?");
			$statement->bindParam(1, $courriel);
			$statement->bindParam(2, $pwd);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();

		 	$info = $statement->fetchAll();

		 	return $info;

		}
	}