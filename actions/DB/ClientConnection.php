<?php
	require_once("actions/CommonAction.php");
	require_once("Connection.php");

	class ClientConnection{
		private static $connection;
		//Inserer un nouveau client dans la BD
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
    			//var_dump($e->getMessage());
    			echo mysql_errno();
				}
		}
		public static function insertCompte($id) {	
			$connection = Connection::getConnection();
			$statement = $connection->prepare("INSERT INTO COMPTE(ID_CLIENT) VALUES (?)");
			$statement->bindParam(1, $id);
			try{
				$statement->execute();
			}
			catch(PDOException $e) {
    			var_dump($e->getMessage());
    		}
		}
		//Modifier les infos dun client dans la BD
		public static function modifClient($id,$adresse,$tel,$mdp){
			echo $id;
			echo $tel;
			echo $adresse;			
			$connection = Connection::getConnection();
			$statement = $connection->prepare("UPDATE CLIENT SET ADRESSE = ?, TELEPHONE = ?, MDP = ? WHERE ID_CLIENT = ?");
			$statement->bindParam(1, $adresse);
			$statement->bindParam(2, $tel);
			$statement->bindParam(3, $mdp);
			$statement->bindParam(4, $id);

			$statement->execute();
		}
		//Aller chercher les infos d'un client dans la BD
		public static function getClient($id){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM CLIENT WHERE ID_CLIENT = ?");
			$statement->bindParam(1, $id);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();

		 	$info = $statement->fetchAll();
		 	return $info;
		}

		//Verifier si le courriel existe deja dans la BD
		public static function verifCourriel($courriel){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM CLIENT WHERE COURRIEL = ?");
			$statement->bindParam(1, $courriel);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();

		 	$info = $statement->fetch();
		 	return $info;
		}
	}