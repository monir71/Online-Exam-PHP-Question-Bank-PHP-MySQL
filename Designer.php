<?php
	session_start();
	error_reporting(E_ALL);
	if(($_SESSION['user'] == '') && ($_SESSION['pass'] == ''))
	{
		header('Location:index.php');
	}
	else
	{
		
	}
?>

<?php
	
	class Designer
	{
		private function __construct()
		{

		}
		
		public static function design_table($array)
		{
			if(is_array($array) && !is_null($array))
			{
				echo "<table width='100%' id='design_table'>";

				foreach($array as $val)
				{
						foreach($val as $k => $v)
						{
							echo '<tr id="boom">';
							echo '<td ';
							if($k=='ques_no' | $k=='answer') echo 'id="hlt" ';
							echo 'style="text-align:center; width:10%">';
							if($k == 'option_a' || $k == 'option_b' || $k == 'option_c' || $k == 'option_d' || $k == 'option_e' || $k == 'option_f')
							{
								$opt = explode('_', $k);
								array_shift($opt);
								echo strtoupper(implode(' ', $opt));
							} elseif($k=='ques_no')
							{
								echo "Question";
							} elseif($k=='cat')
							{
								echo "Category";
							}
							elseif($k=='subcat')
							{
								echo "Sub-Category";
							}
							elseif($k=='answer')
							{
								echo "Answer";
							}
							else
							{
								echo "Description";
							}
							echo '</td>';
							echo '<td ';
							if($k=='ques_no') echo 'id="hlt" ';
							if($k == 'ques_desc')
							{
								echo 'style="text-align:left; border-left:5px solid #A7C942;">';
							} else {
								echo 'style="text-align:left;">';
							}							
							if($k == 'answer')
							{
								$num_answer = explode(',', $v);
								array_shift($num_answer);
								echo strtoupper(implode(', ', $num_answer));
							} else 
							{
								echo highlight_string(htmlspecialchars_decode(wordwrap($v, 100), ENT_QUOTES), true);
							}
							echo '</td>';
							echo '</tr>';
						}
				}
				echo "</table>";
			}
			else
			{
				echo "Error: Input parameter is not valid.";
			}
		}
		
	}
?>