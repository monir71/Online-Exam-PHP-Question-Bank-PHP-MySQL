<?php
	
	class Create
	{
		private static $sql = 	'CREATE TABLE _tmytable(
									id INT(10) NOT NULL AUTO_INCREMENT,
									fname VARCHAR(50) NOT NULL,
									lname VARCHAR(50) NOT NULL,
									age INT(5) NOT NULL,
									sex VARCHAR(10) NOT NULL,
									profession VARCHAR(50) NOT NULL,
									address VARCHAR(255) NOT NULL,
									hobby VARCHAR(50) DEFAULT NULL,
									PRIMARY KEY(id)
								) ENGINE=MyISAM';
		
		private function __construct()
		{
			
		}
		
		public static function table(mysqli $connection, $sql = "")
		{
			if(!($connection instanceof mysqli)) die("Invalid Connection parameter");
			$args = func_get_args();
			if(isset($args[1]) && $args[1] != "")
			{
				if($connection->query($sql) !== true)
				{
					die(self::get_create_error($connection));
				}
				return true;
			}
			if($connection->query(self::$sql) !== true)
			{
				die(self::get_create_error($connection));
			}
		}
		
		private static function get_create_error(mysqli $connection)
		{
			return "Error " . $connection->errno . ": " . $connection->error;
		}
	}

?>