<?php
	error_reporting(0);
	include "Configuration.php";
	
	Class Connection extends Configuration
	{		
		private static $connection = null;
		
		private function __construct()
		{
			
		}
		
		public static function get_connection()
		{
			if(is_null(self::$connection))
			{
				self::$connection = new mysqli(self::$host, self::$user, self::$pass, self::$db, self::$port);
				if(self::$connection->connect_error != null)
				{
					die("Could not connect to the server. Please check the connection parameters in Configuration.");
				}
				return self::$connection;
			}
			else
			{
				return self::$connection;
			}			
		}
		
		public static function create_database($db_name)
		{
			if(self::$connection == null)
			{
				die("Connection is not set. Please configure connection first.");
			}
			$sql = 'CREATE DATABASE ' . $db_name;
			if(self::get_connection()->query($sql) !== true)
				die(self::get_connection_error());
		}
		
		private static function get_connection_error()
		{
			return "Error " . self::get_connection()->errno . ": " . self::get_connection()->error;
		}
		
		public function __destruct()
		{
			self::$connection->close();
		}
	}

?>