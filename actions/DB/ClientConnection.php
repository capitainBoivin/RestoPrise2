<?php
	require_once("actions/CommonAction.php");
	require_once("Connection.php");

	class ClientConnection{
		private static $connection;

		public static function insertClient($nom,$prenom,$adresse,$tel,$dateNaissance,$courriel,$mdp) {	
			$connection = Connection::getConnection();
			$statement = $connection->prepare("INSERT INTO CLIENT(NOM,PRENOM,DATENAISSANCE,ADRESSE,TELEPHONE,COURRIEL,MDP) VALUES (?,?,?,?,?,?,?)");
			$statement->bindParam(1, $nom);
			$statement->bindParam(2, $prenom);
			$statement->bindParam(3, $dateNaissance);
			$statement->bindParam(4, $adresse);
			$statement->bindParam(5, $tel);
			$statement->bindParam(6, $courriel);
			$statement->bindParam(7, $mdp);
			try{
				$statement->execute();
			}
			catch(PDOException $e) {
    			$e->getMessage();
				}
		}

		public static function loginUser($user,$pwd){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM CLIENT WHERE COURRIEL=? AND MDP =?");
			$statement->bindParam(1, $user);
			$statement->bindParam(2, $pwd);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();

		 	$info = $statement->fetchAll();
		 	return $info;
		}
	}