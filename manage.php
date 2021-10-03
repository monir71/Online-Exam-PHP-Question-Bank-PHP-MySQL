<?php
	session_start();
	error_reporting(E_ALL);
	require "Connection.php";
	if(($_SESSION['user'] == 'monir') || ($_SESSION['pass'] == 'strength'))
	{
		if(isset($_GET['que']))
		{
			delete_record($_GET['que']);
		}
	}
	else
	{
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="main_style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style type="text/css">
		table, th, tr, td {border:1px solid black;}
	</style>
	</head>
<body class="body">
	<header class="mainheader">
		<h1>Management Tools</h1>
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
					<h2>Test Summary</h2>
				</header>
				<content>
					<table width="50%" align="center" style="border-collapse:collapse;">
					<th>Name</th><th>Test</th><th>Score</th><th>Action</th>
					<?php
						$connection = Connection::get_connection();
						$sql = "SELECT ser, id, testname, score FROM testinfo ORDER BY id";
						$result = $connection->query($sql);
						while($row = $result->fetch_assoc())
						{
							echo "<tr><td>" . get_name($row['id']) . "</td><td>" . get_test_name($row['testname']) . "</td><td>" . $row['score'] . '</td><td><a href="manage.php?que=' . $row['ser'] . '">Delete</a></td></tr>'; 
						}
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
		
		function delete_record($ser)
		{
			$connection = Connection::get_connection();
			$sql = "DELETE FROM testinfo WHERE ser=" . $ser;
			$result = $connection->query($sql);
		}
	?>
</body>
</html>