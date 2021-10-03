<?php
	error_reporting(0);
	class Insert
	{
		private function __construct()
		{
			
		}
		
		public static function into(mysqli $connection, $table, array $fields = null, array $values = null)
		{
			$args = func_get_args();
			
			$sql = "INSERT INTO " . $table;
			
			if(!isset($args[2]) || null === $fields || is_string($fields) || empty($fields))
			{
				echo "Error: Please insert field names as an array as the third parameter.";
				return false;
			}
			else
			{
				$sql .= " (" . implode(', ', $fields) . ") VALUES ";
			}
			
			if(!isset($args[3]) || null === $values || is_string($values) || empty($values))
			{
				echo "Error: Please insert values as an array as the fourth parameter.";
				return false;
			}
			else
			{
				if(is_array($values[0]))
				{
					foreach($values as $val)
					{
						$sql .= '("' . implode('", "', $val) . '")';
					}
				}
				else 
				{
					$sql .= '("' . implode('", "', $values) . '")';
				}
			}
			
			if($connection->query($sql) === false)
			{
				die(self::get_error($connection));
			}
			else
			{
				echo $connection->info;
			}
		}
		
		private static function get_error(mysqli $connection)
		{
			return "Error " . $connection->errno . ": " . $connection->error;
		}
	}
?>