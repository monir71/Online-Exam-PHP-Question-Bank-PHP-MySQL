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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP Forum</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="main_style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
	</head>
<body class="body">
	<header class="mainheader">
		<h1>Forum</h1>
		<p style="text-align:right; color:white;"><span style="background:#3B7766; padding:5px;">Signed in as : <?php echo ucfirst($_SESSION['user']); ?>&nbsp; &nbsp;| &nbsp; &nbsp;<span>
		<a href="logout.php"><u>Sign out</u></a>
		</p>
		<nav><ul>
			<li><a href="Home.php">Home</a></li>
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
		<div class="content">	
			<article class="topcontent">
				<header>
					<h2>Blank</h2>
				</header>
				<footer>
					
				</footer>
				<content style="font-size:20px;">
					
				</content>
			</article>
			
		</div>
	</div>
	
	<footer class="mainfooter">
		<p>Copyright &copy; Sphinx 2017</p>
	</footer>

</body>
</html>