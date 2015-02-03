<?php
	require_once("actions/DB/ConnectionAction.php");
	session_start();


	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
		public static $VISIBILITY_ADMIN = 2;

		private $pageVisibility;

		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}

		public function execute() {
			if(isset($_POST["entrer"]))
			{		
					$this->result = ConnectionAction::loginUser($_POST["name"],$_POST["pwd"]);
					var_dump($this->result);
					if($this->result)
					{
						$_SESSION["client_id"] = $this->result[0]["ID_CLIENT"];
						$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
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