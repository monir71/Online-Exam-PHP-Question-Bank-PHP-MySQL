<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['user'] == '') || ($_SESSION['pass'] == '') || $_SESSION['test_name'] == '')
	{
		header('Location:index.php');
	}
	
	include "QuestionSet.php";
	
	$score = ceil((QuestionSet::get_score(Connection::get_connection(), $_POST) / $_SESSION['test_name']) * 100);
	
	$justify = (bool) $_SESSION['test_name'];
	if($justify)
	{
		QuestionSet::save_score(Connection::get_connection(), $score, $_SESSION['test_name'], $_SESSION['user'], $_SESSION['pass']);
	}
	
	function get_message($score, $user)
	{
		if($score > 90) return ucfirst($user) . ", you are really genius!";
		if($score > 80) return ucfirst($user) . ", you are so brilliant!";
		if($score > 69) return "Congratulations!";
		if($score < 70) return "Sorry!";
	}
	
	function get_score($score)
	{
		if ($score < 70) return 'Your score is <span style="color:red">' . $score . "<span>";
		if ($score > 69) return 'Your score is <span style="color:green">' . $score . "<span>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP Question Bank</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="main_style.css" type="text/css" />
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
	<style type="text/css">
		table, th, tr, td {border:1px solid black;}
	</style>
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
			  <a class="navbar-brand" href=""> Score Board </a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar" style="font-weight:bolder;">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="home.php">Home</a></li>
				<li><a href="QuizTen.php">Quiz (10)</a></li>
				<li><a href="QuizTwenty.php">Quiz (20)</a></li>
				<li><a href="GeneralTest.php">General (40)</a></li>
				<li><a href="ExpertTest.php">Expert (50)</a></li>
				<li><a href="SpecialTest.php">Special (70)</a></li>
				<li><a href="Support.php">Support</a></li>
				<li><a href="Forum.php">Forum</a></li>
				<li><a href="">Signed in as : <span style="color:green;"><?php echo ucfirst($_SESSION['user']); ?></span></a></li>
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

	<div class="maincontent">
		<div class="content" style="text-align:center;">
			<article class="bottomcontent">
				<header>
					<h1><?php echo get_message($score, $_SESSION['user']); ?></h1>
					<h1><?php echo get_score($score); ?></h1>
				</header>
				<content>
					
				<content>
			</article>
			
			<article class="topcontent">
				<header>
					<h2>Test Summary</h2>
				</header>
				<footer>
					
				</footer>
				<content>
					<table width="50%" align="center" style="border-collapse:collapse;">
						<th>Serial Number</th><th>Test Name</th><th>Score</th>
						<?php
							$arr = QuestionSet::get_all_test(Connection::get_connection(), $_SESSION['user'], $_SESSION['pass']);
							$i = 1;
							foreach($arr as $val)
							{
								echo "<tr><td>" . $i++ . "</td>";
								echo "<td>";
								if($val['testname'] == 10) echo "Quiz Ten";
								if($val['testname'] == 20) echo "Quiz Twenty";
								if($val['testname'] == 40) echo "General Test";
								if($val['testname'] == 50) echo "Expert Test";
								if($val['testname'] == 70) echo "Special Test";
								echo "</td>";
								echo "<td>" . $val['score'] . "</td>";
								echo "</tr>";
							}
							//$_SESSION['test_name'] = "";
						?>
					</table>
				</content>
			</article>
			
		</div>
	</div>
	
	<footer class="mainfooter">
		<p>Copyright &copy; Sphinx 2017</p>
	</footer>

</body>
</html>