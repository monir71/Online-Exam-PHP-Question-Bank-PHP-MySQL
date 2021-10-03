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
	<title>PHP Question Bank</title>
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
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-book"></span> &nbsp; General Instructions</div>
				<div class="panel-body text-justify">
				<ul>
					<li>Here you can test yourself with Quiz(10) and Quiz(20) within 5 to 10 minutes.</li><br>
					<li>Before you proceed to take test on General, Expert or Special tests, you have to complete at least 05 (five) quiz at any range.</li>
					
						<?php if(isset($_SESSION['msg']))
							{
								echo '<p style="background:red; color:white; font-weight:bolder; text-align:center; padding-top:20px; padding-bottom:20px; margin-top:10px;">' . $_SESSION['msg'] . '</p>'; $_SESSION['msg']=null;
							}
						?>					
				</ul>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-book"></span> &nbsp; Why Test ?</div>
				<div class="panel-body text-justify">
				<ul>
					<li>There are a lot of benefits to utilizing practice tests, and effectively taking preparation for the final test is a giant one (e.g. Zend PHP Certification). With practice tests, trainees can acquire a feel for the types of questions they should expect to make out during the test period, and they will also assist them realize areas they require to recover on. Prior to attending a practice test trainees can feel overwhelmed by the quantity of material they are expected to review and study. After sitting down with their practice test results, however, they can get a better sense of which areas are weakest, noted the Psychology of Learning and Motivation. With this knowledge, they can then focus their labors in a more useful manner.</li><br>
					<li>Knowing which topics are the most complex to grasp can help trainees feel more confident in their studying abilities.</li><br>
					<li>Another benefit of taking practice tests is the familiarity of resources. Using these study resources, trainees can get a feel for the design and question types the exams will have and won't be as anxious when answering the questions. They will feel more self-assured because they will be used to reading and analyzing similar question structures.</li><br>
					<li>Timed exams can be a big difficulty for trainees who aren't used to having a strict time limit. With testing exercises, trainees can take their work home where they can time themselves as they work on questions. Doing these drills will allow trainees to understand how much time they have to expend on each difficulty. This way, they can adjust to the timing and be ready for the final.</li><br>
					<li>Using practice tests can assist trainees get prepared for all types of international standards tests.</li><br>
					<p style="text-align:right;">- Md Moniruzzaman on 27 August 2017</p>
				</ul>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-book"></span> &nbsp; This Question Bank covers...</div>
				<div class="panel-body text-justify">
				<ul>
					<li>Basic
						<ul>
							<li>Operator</li>
							<li>Language Constructs and Functions</li>
							<li>Extensions</li>
							<li>Forms</li>
							<li>Syntax</li>
							<li>Control Structures</li>
							<li>Performance and Bytecode Caching</li>
							<li>Namespaces</li>
							<li>Variables</li>
							<li>Config</li>
							<li>Operators</li>
							<li>Quoting</li>
						</ul>
					</li><br>
					<li>IO
						<ul>
							<li>File System Functions</li>
							<li>Reading</li>
							<li>Files</li>
							<li>Streams</li>
							<li>Writing</li>
						</ul>
					</li><br>
					<li>Database and Sql
						<ul>
							<li>SQL Injection</li>
							<li>Transactions</li>
							<li>SQL</li>
							<li>PDO</li>
							<li>Prepared Statements</li>
							<li>Joins</li>
						</ul>
					</li><br>
					<li>OOP
						<ul>
							<li>Instantiation</li>
							<li>Modifiers/Inheritance</li>
							<li>Instance Methods & Properties</li>
							<li>SPL</li>
							<li>Interfaces</li>
							<li>Magic (_*) Methods</li>
							<li>Class Constants</li>
							<li>Reflection</li>
							<li>Type Hinting</li>
							<li>Autoload</li>
							<li>Traits</li>
						</ul>
					</li><br>
					<li>Security
						<ul>
							<li>Encryption, Hashing algorithms</li>
							<li>Sessions</li>
							<li>ross-Site Scripting</li>
							<li>PHP Configuration</li>
							<li>Filter Input</li>
							<li>File uploads</li>
							<li>Email Injection</li>
							<li>Session Security</li>
							<li>Configuration</li>
							<li>Cross-Site Request Forgeries</li>
							<li>scape Output</li>
						</ul>
					</li><br>
					<li>Data format and Types
						<ul>
							<li>SimpleXML</li>
							<li>SOAP</li>
							<li>XML Basics</li>
							<li>DateTime</li>
							<li>DOMDocument</li>
							<li>Webservices Basics</li>
							<li>JSON</li>
						</ul>
					</li><br>
					<li>Web Features
						<ul>
							<li>HTTP Headers</li>
							<li>Cookies</li>
							<li>Forms</li>
							<li>Sessions</li>
							<li>GET and POST data</li>
							<li>HTTP Authentication</li>
							<li>PHP Configuration</li>
						</ul>
					</li><br>
					<li>Arrays
						<ul>
							<li>Array Functions</li>
							<li>Casting</li>
							<li>Array Iteration</li>
							<li>SPL, Objects as arrays</li>
							<li>Associative Arrays</li>
						</ul>
					</li><br>
					<li>String and Patterns
						<ul>
							<li>Matching</li>
							<li>Extracting</li>
							<li>PCRE</li>
							<li>Formatting</li>
							<li>Quoting</li>
							<li>Replacing</li>
							<li>Searching</li>
						</ul>
					</li><br>
					<li>Functions
						<ul>
							<li>Arguments</li>
							<li>Returns</li>
							<li>Variables</li>
							<li>References</li>
							<li>Type Declarations</li>
						</ul>
					</li><br>
					<li>Error Handling
						<ul>
							<li>Handling Exceptions</li>
							<li>Errors</li>
						</ul>
					</li><br>
					
				</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
		
		</div>
	</div>
	
	<footer>
		<p style="text-align:center;">Copyright &copy; monir 2017</p>
	</footer>

</body>
</html>