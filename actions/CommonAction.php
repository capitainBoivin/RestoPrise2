<?php
	require_once("actions/DB/CommonConnection.php");
	session_start();


	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
		public static $VISIBILITY_RESTAURATEUR = 2;
		public static $VISIBILITY_ENTREPRENEUR = 3;

		private $pageVisibility;

		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}

		public function execute() {
			if(isset($_POST["entrer"]))
			{		
					$this->result = CommonConnection::loginUser($_POST["name"],$_POST["pwd"]);
					if($this->result)
					{
						$_SESSION["client_id"] = $this->result[0]["ID_CLIENT"];
						$_SESSION["visibility"] =$this->result[0]["VISIBILITE"];
						$_SESSION["nom"] = $this->result[0]["PRENOM"];
					}
					
			}
			if (isset($_POST["deconnexion"])){
				session_unset();
				session_destroy();
				session_start();
				}

			if (empty($_SESSION["visibility"])) {
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
			}

			if ($_SESSION["visibility"] < $this->pageVisibility) {
				header("location:index.php");				
				exit;
			}


			$this->executeAction();
		}

		protected abstract function executeAction();


		public function isLoggedIn() {
			return $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;
		}

		public function getPrenomUser(){
			return $_SESSION["nom"];
		}

	}