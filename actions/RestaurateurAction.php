<?php
	require_once("CommonAction.php");
	require_once("actions/DB/RestaurateurConnection.php");
	require_once("actions/DB/CommonConnection.php");
	class restaurateurAction extends CommonAction{
		public $restaurateurs;
		public $restaurateur;
		public $restaurants;
		public $entrepreneur;
		public $result;
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ENTREPRENEUR);
		}

		public function executeAction() {
		// On va chercher la liste des restaurateurs et la liste des restaurants
			$this->restaurateurs = RestaurateurConnection::getAllForEntrepreneur(1);
		//Si un restaurateur est selectionne
			if (isset($_GET["modif"])){
				for ($i=0;$i<count($this->restaurateurs);$i++){
					if ($this->restaurateurs[$i]["ID_RESTAURATEUR"] == $_GET["modif"]){
						$this->restaurateur = $this->restaurateurs[$i];
					}
				}
			}
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
					RestaurateurConnection::AjoutRestaurateur($nom,$prenom,$tel,$courriel,$mdp,$resto);
					header("Location:restaurateur.php?confirmationAjout=true");
				}
			}
			// Si le bouton de modif un restaurateur
			if (isset($_POST["bModifierR"]))
			{ 
				if(!empty($_POST["tel"])){
					$tel = $_POST["tel"];
				}

				if(!empty($_POST["courriel"])){
					$courriel = $_POST["courriel"];
				}
				if(!empty($_POST["resto"])){
					$resto = $_POST["resto"];
				}
				$id = $_POST["bModifierR"];
				RestaurateurConnection::ModifRestaurateur($id,$tel,$courriel,$resto);
				header("Location:restaurateur.php?modif=".$_POST["bModifierR"]."&confirmerModif=".$_POST["bModifierR"]);
			}
			// Si le bouton supprimer un restaurateur a été pressé
			else if (isset($_POST["bSupprimerR"]))
			{  
				header("Location:restaurateur.php?supp=true&confirmationSupp=".$_POST["restaurateurid"]);
			}

			// Si le bouton de confirmation de la suppression a ete presser
			else if (isset($_POST["bConfirmerSupp"]))
			{  
				$idRestaurateur = $_POST["bConfirmerSupp"];
				RestaurateurConnection::SupprimerRestaurateur($idRestaurateur);
				header("Location:restaurateur.php?suppExec=true");
			}

			// Si le bouton de gestion des restaurateurs
			else if (isset($_POST["bGererR"]))
			{  
				
				header("Location:restaurateur.php?modif=".$_POST["restaurateurid"]);
			}

			// Si le bouton de gestion des restaurateurs
			else if (isset($_POST["bConfirmerModif"]))
			{  
				
				header("Location:restaurateur.php?modifDone=true");
			}
		}
	}