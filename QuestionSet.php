<?php
	error_reporting(0);
	require "Connection.php";
	
	class QuestionSet
	{
		private function __construct()
		{
			
		}
		
		public static function get_total_question(mysqli $connection)
		{
			$sql = "SELECT ques_no FROM question";
			return $connection->query($sql)->num_rows;			
		}
		
		public static function get_random_question(mysqli $connection, $total_question)
		{
			$sql = "SELECT ques_no, ques_desc, option_a, option_b, option_c, option_d, option_e, option_f, answer, cat, subcat FROM question WHERE ques_no =" . rand(1, $total_question);
			$result = $connection->query($sql);
			$data = array();
			while($row = $result->fetch_assoc())
			{
				$data[] = $row;
			}
			return $data;
		}
		
		public static function get_score(mysqli $connection, $submit_answer)
		{
			array_pop($submit_answer);
			$score = 0;
			
			foreach($submit_answer as $key => $val)
			{
				$ques = explode("_", $key);
				
				if(is_array($val))
				{
					$user_ans = implode(",", $val);
				}
				else
				{
					$user_ans = $val;
				}
				$user_ans = $ques[0] . "," . $user_ans;
				
				$sql = "SELECT answer FROM question WHERE ques_no=" . $ques[0];
				$result = $connection->query($sql);
				while($row = $result->fetch_assoc())
				{
					$correct_ans = $row['answer'];
				}
				
				if($correct_ans == $user_ans)
				{
					$score += 1;;
				}
			}
			return $score;
		}
		
		public static function save_score(mysqli $connection, $score, $test_name, $user, $pass)
		{
			$sql = 'SELECT id FROM authen WHERE nameuser="' . $user . '" AND wordname="' . $pass . '"';
			$result = $connection->query($sql);
			while($row = $result->fetch_assoc())
			{
				$id = $row['id'];
			}
			
			$sql = 'INSERT INTO testinfo(id, testname, score) VALUES("' . $id . '","' . $test_name . '","' . $score . '")';
			$result = $connection->query($sql);
		}
		
		public static function get_eligibility(mysqli $connection, $user, $pass)
		{
			$sql = 'SELECT id FROM authen WHERE nameuser="' . $user . '" AND wordname="' . $pass . '"';
			$result = $connection->query($sql);
			while($row = $result->fetch_assoc())
			{
				$id = $row['id'];
			}
			
			$sql = "SELECT id FROM testinfo WHERE id=" . $id . " AND score > 69";
			$taken = $connection->query($sql)->num_rows;
			
			if($taken < 5)
			{
				$_SESSION['msg'] = "Attention! You are not eligible to take this test. You need to take " . (5 - $taken) . " more quiz.";
				header("Location:Home.php");
			}
		}
		
		public static function get_all_test(mysqli $connection, $user, $pass)
		{
			$sql = 'SELECT id FROM authen WHERE nameuser="' . $user . '" AND wordname="' . $pass . '"';
			$result = $connection->query($sql);
			while($row = $result->fetch_assoc())
			{
				$id = $row['id'];
			}
			$sql = "SELECT testname, score FROM testinfo WHERE id=" . $id;
			$result = $connection->query($sql);
			while($row = $result->fetch_assoc())
			{
				$data[] = $row;
			}
			return $data;
		}
	}
	
	//echo QuestionSet::get_total_question(Connection::get_connection());
	//echo "<pre>";
	//print_r(QuestionSet::get_random_question(Connection::get_connection(), 694));
	
	//$question_array = QuestionSet::get_random_question(Connection::get_connection(), 100);
	//print_r($question_array);

?>