<?php
	require_once("actions/CommonAction.php");
	require_once("Connection.php");

	class RestaurateurConnection{
		private static $connection;
		//Inserer un nouveau client dans la BD
		public static function ajoutRestaurateur($nom,$prenom,$tel,$courriel,$mdp,$resto) {	
			$connection = Connection::getConnection();
			$statement = $connection->prepare("INSERT INTO RESTAURATEUR(ID_ENTREPRENEUR,NOM,PRENOM,TELEPHONE,COURRIEL,MDP,ID_RESTAURANT) VALUES (1,?,?,?,?,?,?)");
			$statement->bindParam(1, $nom);
			$statement->bindParam(2, $prenom);
			$statement->bindParam(3, $tel);
			$statement->bindParam(4, $courriel);
			$statement->bindParam(5, $mdp);
			$statement->bindParam(6, $resto);
			try{
				$statement->execute();
			}
			catch(PDOException $e) {
    			var_dump($e->getMessage());
				}
	}

	//Verifier si le courriel existe deja dans la BD
		public static function verifCourriel($courriel){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM RESTAURATEUR WHERE COURRIEL = ?");
			$statement->bindParam(1, $courriel);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();

		 	$info = $statement->fetch();
		 	return $info;
		}
	//On prend tout les restaurateurs lies a l,entrepreneur connecte
		public static function getAllForEntrepreneur($id){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM RESTAURATEUR WHERE ID_ENTREPRENEUR = ?");
			$statement->bindParam(1, $id);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();

		 	$info = $statement->fetchAll();
		 	return $info;
		}
	//On prend tout les restaurants lie a lentrepreneur connecte
		public static function getRestaurants($id){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM RESTAURANT WHERE ID_ENTREPRENEUR = ?");
			$statement->bindParam(1, $id);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();

		 	$info = $statement->fetchAll();
		 	return $info;
		}

	//Suppression d'un restaurateur
		public static function supprimerRestaurateur($id){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("DELETE FROM RESTAURATEUR WHERE ID_RESTAURATEUR = ?");
			$statement->bindParam(1, $id);
		 	$statement->setFetchMode(PDO::FETCH_ASSOC);
		 	$statement->execute();
		 	try{
				$statement->execute();
			}
			catch(PDOException $e) {
    			var_dump($e->getMessage());
				}
		}
	//Modification d'un restaurateur
		public static function modifRestaurateur($id,$tel,$courriel,$resto){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("UPDATE RESTAURATEUR SET COURRIEL = ?, TELEPHONE = ?, ID_RESTAURANT = ? WHERE ID_RESTAURATEUR = ?");
			$statement->bindParam(1, $courriel);
			$statement->bindParam(2, $tel);
			$statement->bindParam(3, $resto);
			$statement->bindParam(4, $id);

			$statement->execute();
		}
	}