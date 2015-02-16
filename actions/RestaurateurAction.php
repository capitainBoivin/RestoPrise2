<?php
	require_once("CommonAction.php");
	require_once("actions/DB/RestaurateurConnection.php");
	require_once("actions/DB/CommonConnection.php");
	class restaurateurAction extends CommonAction{
		public $restaurateurs;
		public $restaurants;
		public $entrepreneur;
		public $result;
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ENTREPRENEUR);
		}

		public function executeAction() {

		// On va chercher la liste des restaurateurs et la liste des restaurants
			$this->restaurateurs = RestaurateurConnection::getRestaurateurs(1);
			$this->restaurants = RestaurateurConnection::getRestaurants(1);
		// Si le bouton ajouter un restaurateur a été pressé
			if (isset($_POST["bAjoutR"]))
			{  
				if(!empty($_POST["nom"])){
					$nom = $_POST["nom"];
				}
				if(!empty($_POST["prenom"])){
					$prenom = $_POST["prenom"];
				}

				if(!empty($_POST["tel"])){
					$tel = $_POST["tel"];
				}

				if(!empty($_POST["courriel"])){
					$courriel = $_POST["courriel"];
				}
				if(!empty($_POST["mdp"])){
					$mdp = $_POST["mdp"];
				}
				if(!empty($_POST["resto"])){
					$resto = $_POST["resto"];
				}
				//On verifie sur le courriel existe deja dans la BD
				$existe = RestaurateurConnection::verifCourriel($courriel);
				if ($existe==true)
				{
					$_SESSION["client_id"] = 1;
					$_SESSION["visibility"] = CommonAction::$VISIBILITY_ADMIN;
					$_SESSION["nom"] = "JOHN LENTREPRENEUR";

					header("Location:restaurateur.php?courriel=true");
				}
				else {
					RestaurateurConnection::InsertRestaurateur($nom,$prenom,$tel,$courriel,$mdp,$resto);
					header("Location:restaurateur.php?confirmationAjout=true");
				}
			}

			// Si le bouton ajouter un restaurateur a été pressé
			if (isset($_POST["bSupprimerR"]))
			{  
				header("Location:restaurateur.php?supp=true?confirmationSupp=true");
			}
		}
	}