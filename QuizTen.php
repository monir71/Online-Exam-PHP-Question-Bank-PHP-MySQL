<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['user'] == '') && ($_SESSION['pass'] == ''))
	{
		header('Location:index.php');
	}
	
	include "QuestionSet.php";
	
	$_SESSION['test_name'] = 10;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quiz 10</title>
	<meta charset="utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Fredericka the Great' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Faster One' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Katibeh' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Ribeye Marrow' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Bungee Outline' rel='stylesheet'>
</head>
<body class="body">
	<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href=""><span class="glyphicon glyphicon-education"></span> PHP Question Bank </a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar" style="font-weight:bolder;">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="QuizTen.php">Quiz (10)</a></li>
				<li><a href="QuizTwenty.php">Quiz (20)</a></li>
				<li><a href="GeneralTest.php">General (40)</a></li>
				<li><a href="ExpertTest.php">Expert (50)</a></li>
				<li><a href="SpecialTest.php">Special (70)</a></li>
				<li><a href="Support.php">Support</a></li>
				<li><a href="Forum.php">Forum</a></li>
				<li><a href=""><span style="color:green;"><span class="glyphicon glyphicon-user"></span> <?php echo ucfirst($_SESSION['user']); ?></span></a></li>
				<?php
					if(($_SESSION['user'] == 'monir') || ($_SESSION['pass'] == 'strength'))
					{
						echo '<li><a href="manage.php">Admin</a></li>';
						echo '<li><a href="InputData.php">Add Question</a></li>';
					}
				?>
			  </ul>
			</div>
		  </div>
		</nav>
	
	<div class="row" style="margin-top:100px">
		<div class="col-sm-2">
		
		</div>
		<div class="col-sm-8">
			<content>
			<?php
				echo '<h3 class="bg-primary text-center" id="loa-0" style="padding-top:20px; padding-bottom:20px; font-family:\'Fredericka the Great\'">Quiz 10</h3><br>';
			?>
				<form name="examform" action="ScoreBoard.php" method="POST">
				<table width="100%">
					<?php
						$total_question = QuestionSet::get_total_question(Connection::get_connection());
						
						for($i = 1; $i <= 10; $i++)
						{
							$question_array = QuestionSet::get_random_question(Connection::get_connection(), $total_question);
							
					?>
					<tr style="vertical-align:top;">
						<td width="5%" style="background:lightgrey; text-align:center; border-top:10px solid grey;">
						<?php echo $i; ?>
						</td>
						<td colspan="2" style="padding:10px 5px 10px 10px; border-bottom:1px solid grey; border-top:10px solid grey;">
						<?php highlight_string(htmlspecialchars_decode(wordwrap($question_array[0]['ques_desc'], 100), ENT_QUOTES)); ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<?php if(!empty($question_array[0]['option_a'])) { ?>
					<tr style="vertical-align:top;">
						<td width="5%" style="text-align:center;">A</td>
						<td>
							<input type="<?php echo get_type($question_array[0]['answer']); ?>" name="<?php echo get_name($question_array[0]['ques_no'], $question_array[0]['answer']); ?>" value="a">
						</td>
						<td style="">
						<?php highlight_string(htmlspecialchars_decode(wordwrap($question_array[0]['option_a'], 100), ENT_QUOTES)); ?>
						</td>
					</tr>
					<?php } ?>
					
					
					<?php if(!empty($question_array[0]['option_b'])) { ?>
					<tr style="vertical-align:top;">
						<td width="5%" style="text-align:center;">B</td>
						<td>
							<input type="<?php echo get_type($question_array[0]['answer']); ?>" name="<?php echo get_name($question_array[0]['ques_no'], $question_array[0]['answer']); ?>" value="b">
						</td>
						<td style="">
						<?php highlight_string(htmlspecialchars_decode(wordwrap($question_array[0]['option_b'], 100), ENT_QUOTES)); ?>
						</td>
					</tr>
					<?php } ?>
					
					
					<?php if(!empty($question_array[0]['option_c'])) { ?>
					<tr style="vertical-align:top;">
						<td width="5%" style="text-align:center;">C</td>
						<td>
							<input type="<?php echo get_type($question_array[0]['answer']); ?>" name="<?php echo get_name($question_array[0]['ques_no'], $question_array[0]['answer']); ?>" value="c">
						</td>
						<td style="">
						<?php highlight_string(htmlspecialchars_decode(wordwrap($question_array[0]['option_c'], 100), ENT_QUOTES)); ?>
						</td>
					</tr>
					<?php } ?>
					
					<?php if(!empty($question_array[0]['option_d'])) { ?>
					<tr style="vertical-align:top;">
						<td width="5%" style="text-align:center;">D</td>
						<td>
							<input type="<?php echo get_type($question_array[0]['answer']); ?>" name="<?php echo get_name($question_array[0]['ques_no'], $question_array[0]['answer']); ?>" value="d">
						</td>
						<td style="">
						<?php highlight_string(htmlspecialchars_decode(wordwrap($question_array[0]['option_d'], 100), ENT_QUOTES)); ?>
						</td>
					</tr>
					<?php } ?>
					
					<?php if(!empty($question_array[0]['option_e'])) { ?>
					<tr style="vertical-align:top;">
						<td width="5%" style="text-align:center;">E</td>
						<td>
							<input type="<?php echo get_type($question_array[0]['answer']); ?>" name="<?php echo get_name($question_array[0]['ques_no'], $question_array[0]['answer']); ?>" value="e">
						</td>
						<td style="">
						<?php highlight_string(htmlspecialchars_decode(wordwrap($question_array[0]['option_e'], 100), ENT_QUOTES)); ?>
						</td>
					</tr>
					<?php } ?>
					
					<?php if(!empty($question_array[0]['option_f'])) { ?>
					<tr style="vertical-align:top;">
						<td width="5%" style="text-align:center;">F</td>
						<td>
							<input type="<?php echo get_type($question_array[0]['answer']); ?>" name="<?php echo get_name($question_array[0]['ques_no'], $question_array[0]['answer']); ?>" value="f">
						</td>
						<td style="">
						<?php highlight_string(htmlspecialchars_decode(wordwrap($question_array[0]['option_f'], 100), ENT_QUOTES)); ?>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">Category: <span style="color:green; text-decoration:underline;"><?php echo $question_array[0]['cat']; ?></span> &nbsp; &nbsp; Sub-Category: <span style="color:green; text-decoration:underline;"><?php echo $question_array[0]['subcat']; ?></span></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<?php
						}
					?>
					<tr>
						<td colspan="3" style="text-align:center; border-top:20px solid green;"><br><input id="submit_button" type="submit" name="submit" value="Submit"></td>
					</tr>
				</table>					
				</form>
			</content>
		</div>
		<div class="col-sm-2">
		
		</div>
	</div>
	
	<footer>
		<p style="text-align:center;">Copyright &copy; monir 2017</p>
	</footer>

	<?php
		function get_type($answer)
		{
			$type = "radio";
			$arr = explode(",", $answer);
			if(isset($arr[2]))
			{
				$type = "checkbox";
			}
			return $type;
		}
		
		function get_name($question_no, $answer)
		{
			$name = $question_no . "_option";
			$arr = explode(",", $answer);
			if(isset($arr[2]))
			{
				$name .= "[]";
			}
			return $name;
		}
		
		
	?>
	
</body>
</html>