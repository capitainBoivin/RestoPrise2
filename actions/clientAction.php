<?php
	require_once("CommonAction.php");
	require_once("actions/DB/ConnectionAction.php");
	class ClientAction extends CommonAction{
		public $client;
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		public function executeAction() {

			//Si le formulaire dajout de client est rempli et si le bouton a ete pese
			if (isset($_POST["bAjoutC"]))
			{  
				if(!empty($_POST["nom"])){
					$nom = $_POST["nom"];
					echo $nom;
				}
				if(!empty($_POST["prenom"])){
					$prenom = $_POST["prenom"];
				}
				if(!empty($_POST["adresse"])){
					$adresse = $_POST["adresse"];
				}
				if(!empty($_POST["tel"])){
					$tel = $_POST["tel"];
				}
				if(!empty($_POST["dateNaissance"])){
					$dateNaissance = $_POST["dateNaissance"];
				}
				if(!empty($_POST["courriel"])){
					$courriel = $_POST["courriel"];
				}
				if(!empty($_POST["mdp"])){
					$mdp = $_POST["mdp"];
				}
				ConnectionAction::insertClient($nom,$prenom,$adresse,$tel,$dateNaissance,$courriel,$mdp);
				header("Location:client.php?confirmation=true");
			}
		}
	}
