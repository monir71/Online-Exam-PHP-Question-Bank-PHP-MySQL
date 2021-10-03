<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['user'] == '') && ($_SESSION['pass'] == ''))
	{
		header('Location:index.php');
	}
	else
	{
		
	}
?>

<?php
	
	class Read
	{
		private static $query_result = array();
		
		private function __construct()
		{
			
		}
		
		public static function table(mysqli $connection, $table, array $column = null, array $where = null, array $orderby = null, $order = "ASC")
		{
			$args = func_get_args();
			
			$sql = "SELECT ";
			
			if(!isset($args[2]) || null === $column || is_string($column) || empty($column))
			{
				$column = "*";
				$sql .= $column;
			}
			else
			{
				$column = implode(', ', $column);
				$sql .= $column;
			}
			$sql .= " FROM " . $table;
			
			if(!isset($args[3]) || null === $where || empty($where) || is_string($where))
			{
				$where = "";
			}
			else
			{
				$where = implode(', ', $where);
				$sql .= " WHERE " . $where;
			}
			
			if(!isset($args[4]) || null === $orderby || empty($orderby) || is_string($orderby))
			{
				$orderby = "";
			}
			else
			{
				$orderby = implode(', ', $orderby);
				$sql .= " ORDER BY " . $orderby;
			}
			
			if(!isset($args[5]) || empty($order) || !is_string($order))
			{
				
			}
			else 
			{
				$order = $order;
				$sql .= " " . $order;
			}
			
			if(($result = $connection->query($sql)) === false)
			{
				die(self::get_error($connection));
			}
			
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					self::$query_result[] = $row;
				}
			}
			else
			{
				return "0 result";
			}
			return self::$query_result;
		}
		
		public static function get_total_question(mysqli $connection)
		{
			$sql = "SELECT ques_no FROM question";
			$result = $connection->query($sql);
			echo $result->num_rows;
		}
		
		private static function get_error(mysqli $connection)
		{
			return "Error " . $connection->errno . ": " . $connection->error;
		}		
	}
	
	

?>