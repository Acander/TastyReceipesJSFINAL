<?php

	namespace Functionality\Integration;

	class DbLogInConfig{
			
		/**
		*	Establishes a connection with the database
		*	@return connection object returns an object representing a connection to the database
		*/
		public function establishDatabaseConnection(){
			require ('C:/wamp64/database.php');
			self::initializeErrorReporting();
			return mysqli_connect($dbServerName, $myUsername, $myPassword, $dbName);
		}
			
		private function initializeErrorReporting(){
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		}
	}

?>