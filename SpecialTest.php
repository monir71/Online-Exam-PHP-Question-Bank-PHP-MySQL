<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['user'] == '') && ($_SESSION['pass'] == ''))
	{
		header('Location:index.php');
	}
	
	include "QuestionSet.php";
	
	QuestionSet::get_eligibility(Connection::get_connection(), $_SESSION['user'], $_SESSION['pass']);
	
	$_SESSION['test_name'] = 70;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Special</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="exam.css" type="text/css" />
	<link rel="stylesheet" href="watch.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="body" onload="show()">
	<header class="mainheader" style="position:fixed; width:90%; background:grey;">
		<p style="text-align:right; color:white;"><span style="background:#3B7766; padding:5px; margin-right:10px;">Signed in as : <?php echo ucfirst($_SESSION['user']); ?><span>&nbsp; &nbsp; <span style="background:#3B7766; padding:5px; margin-right:10px;"><a href="home.php" style="text-decoration:underline; color:white;">Cancel Test</a></span></p>
		<nav> 
			<div><span style="color:white; font-size:15px;"></div>
		</nav>
	</header>
	
	<div class="maincontent">
		<div class="content">
			<article class="bottomcontent">
				<header>
					<h2>&nbsp;</h2>
					<h2 style="text-align:center;">Special Test</h2>
				</header>
				<content>
					<form name="examform" action="ScoreBoard.php" method="POST">
					<table width="100%">
						<?php
							$total_question = QuestionSet::get_total_question(Connection::get_connection());
							
							for($i = 1; $i <= 70; $i++)
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
			</article>			
		</div>
	</div>
	
	<footer class="mainfooter">
		<p>Copyright &copy; Sphinx 2017</p>
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