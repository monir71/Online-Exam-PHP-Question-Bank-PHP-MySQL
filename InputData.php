<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['user'] == 'monir') && ($_SESSION['pass'] == 'strength'))
	{
		
	}
	else
	{
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Question</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="main_style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style type="text/css">
		body {background:lightgrey;}
		label {display:block; font-size:20px; color:green;}
		textarea {background:#F3FFD4;}
		#but {width:100px; border:3px solid lightgreen; background:maroon; padding:10px; font-size:20px; margin-left:500px;}
	</style>
</head>
<body class="body">
	<header class="mainheader">
		<h1>Question Insertion</h1>
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
					echo '<li><a href="Study.php" target="_blank">>></a></li>';
				}
			?>

		</ul></nav>
	</header>
	
	<div class="maincontent">
		<div class="content">	
			<article class="topcontent">
				<header>
					<h2>Insert Question</h2>
				</header>
				<footer>
					<?php
						$id = 0;
						if(isset($_POST['submit']))
						{
							require "Connection.php";
							require "Insert.php";
							$table = "question";
							$fields = array('ques_desc', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'option_f', 'answer', 'cat', 'subcat');
							$id_arr = explode(',', $_POST['answer']);
							$id = $id_arr[0];
							$values = array(
										htmlspecialchars($_POST['ques_desc'], ENT_QUOTES),
										htmlspecialchars($_POST['option_a'], ENT_QUOTES),
										htmlspecialchars($_POST['option_b'], ENT_QUOTES),
										htmlspecialchars($_POST['option_c'], ENT_QUOTES),
										htmlspecialchars($_POST['option_d'], ENT_QUOTES),
										htmlspecialchars($_POST['option_e'], ENT_QUOTES),
										htmlspecialchars($_POST['option_f'], ENT_QUOTES),
										htmlspecialchars($_POST['answer'], ENT_QUOTES),
										htmlspecialchars($_POST['cat'], ENT_QUOTES),
										htmlspecialchars($_POST['subcat'], ENT_QUOTES)
										);
							
							Insert::into(Connection::get_connection(), $table, $fields, $values);
							echo "<p style='padding:10px; font-size:20px; color:white; margin:5px; background:green;'>Data Inserted ID: " . $id . "</p>";
						}	
					?>
				</footer>
				<content style="font-size:20px;">
					<form action="" method="post">
						<label>Question Description:</label>
							<textarea name="ques_desc" cols="100" rows="3"></textarea>
						<label>Option A:</label>
							<textarea name="option_a" cols="100" rows="1"></textarea>
						<label>Option B:</label>
							<textarea name="option_b" cols="100" rows="1"></textarea>
						<label>Option C:</label>
							<textarea name="option_c" cols="100" rows="1"></textarea>
						<label>Option D:</label>
							<textarea name="option_d" cols="100" rows="1"></textarea>
						<label>Option E:</label>
							<textarea name="option_e" cols="100" rows="1"></textarea>
						<label>Option F:</label>
							<textarea name="option_f" cols="100" rows="1"></textarea>
						<label>Answer:</label>
							<textarea name="answer" cols="100" rows="1"><?php if(isset($_POST['submit'])) echo $id + 1 . ',';  ?></textarea><br>
						<label>Category:</label>
						<select name="cat">
							<option>basic</option>
							<option>functions</option>
							<option>data format and types</option>
							<option>web features</option>
							<option>oop</option>
							<option>security</option>
							<option>io</option>
							<option>string and patterns</option>
							<option>database and sql</option>
							<option>arrays</option>
							<option>error handling</option>
						</select>
						<label>Sub Category:</label>
						<select name="subcat">
							<option>Syntax</option>
							<option>Operators</option>
							<option>Variables</option>
							<option>Control Structures</option>
							<option>Language Constructs and Functions</option>
							<option>Namespaces</option> 
							<option>Extensions</option>
							<option>Config</option>
							<option>Performance and bytecode caching</option>
							<option>Arguments</option>
							<option>Variables</option>
							<option>References</option>
							<option>Returns</option>
							<option>Variable Scope</option>
							<option>Anonymous Functions, closures</option>
							<option>Type Declarations</option>
							<option>XML Basics</option>
							<option>SimpleXML</option>
							<option>XML Extension</option>
							<option>Webservices Basics</option>
							<option>SOAP</option>
							<option>JSON</option>
							<option>DateTime</option> 
							<option>DOMDocument</option>
							<option>Sessions</option>
							<option>Forms</option>
							<option>GET and POST data</option>
							<option>Cookies</option>
							<option>HTTP Headers</option>
							<option>HTTP Authentication</option>
							<option>HTTP Status Codes</option>
							<option>Instantiation</option>
							<option>Modifiers/Inheritance</option>
							<option>Interfaces</option>
							<option>Return Types</option>
							<option>Autoload</option>
							<option>Reflection</option>
							<option>Type Hinting</option>
							<option>Class Constants</option>
							<option>Late Static Binding</option>
							<option>Magic (_*) Methods</option>
							<option>Instance Methods & Properties</option>
							<option>SPL</option>
							<option>Traits</option>
							<option>Configuration</option>
							<option>Session Security</option>
							<option>Cross-Site Scripting</option>
							<option>Cross-Site Request Forgeries</option>
							<option>SQL Injection</option>
							<option>Remote Code Injection</option>
							<option>Email Injection</option>
							<option>Filter Input</option>
							<option>Escape Output</option>
							<option>Encryption, Hashing algorithms</option>
							<option>File uploads</option>
							<option>PHP Configuration</option>
							<option>Password hashing API</option>
							<option>Files</option>
							<option>Reading</option>
							<option>Writing</option>
							<option>File System Functions</option>
							<option>Streams</option>
							<option>Contexts</option>
							<option>Quoting</option>
							<option>Matching</option>
							<option>Extracting</option>
							<option>Searching</option>
							<option>Replacing</option>
							<option>Formatting</option>
							<option>PCRE</option>
							<option>NOWDOC</option>
							<option>Encodings</option>
							<option>SQL</option>
							<option>Joins</option>
							<option>Prepared Statements</option>
							<option>Transactions</option>
							<option>PDO</option>
							<option>Associative Arrays</option>
							<option>Array Iteration</option>
							<option>Array Functions</option>
							<option>SPL, Objects as arrays</option> 
							<option>Casting</option>
							<option>Handling Exceptions</option>
							<option>Errors</option>
							<option>Throwables</option>
						</select><br>
						<input id="but" type="submit" name="submit" value="Submit">
					</form>
				</content>
			</article>
			
		</div>
	</div>
	
	<footer class="mainfooter">
		<p>Copyright &copy; Sphinx 2017</p>
	</footer>
	
</body>
</html>