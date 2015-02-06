<?php
	require_once("CommonAction.php");
	require_once("actions/DB/ClientConnection.php");
	require_once("actions/DB/CommonConnection.php");
	class ClientAction extends CommonAction{
		public $client;
		public $result;
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		public function executeAction() {
			//Si le client est deja connecte, on affiche ses infos
			if (isset($_SESSION["client_id"]))
				{
					$this->getClient();
				}
			//Si le formulaire dajout de client est rempli et si le bouton a ete pese
			if (isset($_POST["bAjoutC"]))
			{  echo "dans le creation de client";
				if(!empty($_POST["nom"])){
					$nom = $_POST["nom"];
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
				if(!empty($_POST["annee"])){
					$dateNaissance = $_POST["annee"]."-".$_POST["mois"]."-".$_POST["jour"];
				}
				if(!empty($_POST["courriel"])){
					$courriel = $_POST["courriel"];
				}
				if(!empty($_POST["mdp"])){
					$mdp = $_POST["mdp"];
				}
				//Pour faire le logg in du client apres qu'il se soit inscrit
				ClientConnection::insertClient($nom,$prenom,$adresse,$tel,$dateNaissance,$courriel,$mdp);
				$this->result = CommonConnection::loginUser($courriel,$mdp);
					if($this->result)
					{
						$_SESSION["client_id"] = $this->result[0]["ID_CLIENT"];
						$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
						$_SESSION["nom"] = $this->result[0]["PRENOM"];
					}
				//On va creer le compte
				ClientConnection::insertCompte($_SESSION["client_id"]);
				header("Location:client.php?confirmation=true");
			}
			//Si le bouton de modification de client isset
			if (isset($_POST["bModifC"]))
			{  
				if(!empty($_POST["adresse"])){
					$adresse = $_POST["adresse"];
				}
				if(!empty($_POST["tel"])){
					$tel = $_POST["tel"];
				}
				if(!empty($_POST["mdp"])){
					$mdp = $_POST["mdp"];
				}
				//Pour faire le logg in du client apres qu'il se soit inscrit
				ClientConnection::modifClient($_SESSION["client_id"],$adresse,$tel,$mdp);
				header("Location:client.php?confirmation=true");
			}
		}
			//Aller chercher le nom du client
			public function getClient() {
				$this->client = ClientConnection::getClient($_SESSION["client_id"]);
			}
		}
