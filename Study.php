<?php
	session_start();
	error_reporting(E_ALL);
	if(($_SESSION['user'] == 'monir') || ($_SESSION['pass'] == 'strength'))
	{
		
	}
	else
	{
		header('Location:index.php');
	}
	require "Connection.php";
	require "Read.php";
	require "Designer.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Questions</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="main_style.css" type="text/css" />
	<link rel="stylesheet" href="designer_design_table.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
<body class="body">
	<header class="mainheader">
		<h1>Read All Questions</h1>
		<p style="text-align:right; color:white;"><span style="background:#3B7766; padding:5px;">Signed in as : <?php echo ucfirst($_SESSION['user']); ?>&nbsp; &nbsp;| &nbsp; &nbsp;<span>
		<a href="logout.php"><u>Sign out</u></a>
		</p>
		<nav><ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="QuizTen.php">Quiz (10)</a></li>
			<li><a href="QuizTwenty.php">Quiz (20)</a></li>
			<li><a href="GeneralTest.php">General (40)</a></li>
			<li><a href="ExpertTest.php">Expert (50)</a></li>
			<li><a href="SpecialTest.php">Special (70)</a></li>
			<li><a href="Support.php">Support</a></li>
			<li><a href="Forum.php">Forum</a></li>
			<?php
				if(($_SESSION['user'] == 'monir') || ($_SESSION['pass'] == 'strength'))
				{
					echo '<li><a href="manage.php">Admin</a></li>';
					echo '<li><a href="InputData.php">Add Question</a></li>';
				}
			?>
		</ul></nav>
	</header>
	
	<div class="maincontent">
		<div class="content" style="text-align:center;">
			<article class="bottomcontent">
				<header>
					<h2>Questions (<?php Read::get_total_question(Connection::get_connection()); ?>)</h2>
				</header>
				<content>
					<?php
						$question = Read::table(Connection::get_connection(), "question", array('ques_no', 'ques_desc', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'option_f', 'answer', 'cat', 'subcat'));
						Designer::design_table($question);
					?>
					</table>
				</content>
			</article>			
		</div>
	</div>
	
	<footer class="mainfooter">
		<p>Copyright &copy; Sphinx 2017</p>
	</footer>
	
	<?php
		function get_name($id)
		{
			$connection = Connection::get_connection();
			$sql = "SELECT nameuser FROM authen WHERE id=" . $id;
			$result = $connection->query($sql);
			while($row = $result->fetch_assoc())
			{
				return ucfirst($row['nameuser']);
			}
		}
		
		function get_test_name($test)
		{
			switch($test)
			{
				case 10;
				return "Quiz Ten";
				case 20;
				return "Quiz Twenty";
				case 40;
				return "General";
				case 50;
				return "Expert";
				case 70;
				return "Special";
			}
		}
	?>
</body>
</html>