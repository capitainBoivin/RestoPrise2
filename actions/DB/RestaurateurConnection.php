<?php

	class Connection {
		private static $connection;

		public static function getConnection() {
			if (Connection::$connection == null) 
			{
				$dsn = 'mysql:host=167.114.98.22;dbname=RESTO';
				$username = 'Catherine';
				$password = 'AAAaaa111';
				$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

				try
				{
					Connection::$connection = new PDO($dsn, $username, $password, $options);
					Connection::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					Connection::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}
				
			}

			return Connection::$connection;
		}

		public static function closeConnection() {
			if (Connection::$connection != null) {
				Connection::$connection = null;
			}
		}
	}

