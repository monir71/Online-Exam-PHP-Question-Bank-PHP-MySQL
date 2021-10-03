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
					<h2>Sample code</h2>
				</header>
				<footer>
					<p class="post-info">- Md Moniruzzaman on 09 September 2017</p>
				</footer>
				<content style="font-size:20px;">
					<?php
						highlight_string('
<?php
	class LtSwitchgearPanel
	{
		public $numbers;
		public $panel;
		public $incoming = [];
		public $outgoing = [];
		public $origin = [];
		public $assembling;
	}

	class Breacker 
	{
		public $number;
		public $capacity;
		public $brackingCapacity;
		public $pole;
		public $name;

		public function __construct($number ="", 
		$capacity ="", $brackingCapacity ="", 
		$pole ="", $name ="")
		{        
			$this->number = $number . " Nos.";        
			$this->capacity = $capacity. " A";        
			$this->brackingCapacity = $brackingCapacity . " kA";        
			$this->pole = $pole;
			$this->name = $name;    
		}

		public function getProducer()
		{        
			return  $this->number . " ". 
			$this->capacity . " ". 
			$this->brackingCapacity . " ". 
			$this->pole . " ". 
			$this->name;    
		} 
	}

	$Mcb1 = new Breacker(1, 6, 6, "TP", "MCB");
	$Mcb2 = new Breacker(1, 6, 6, "TP", "MCB");
	$Mcb3 = new Breacker(1, 6, 6, "TP", "MCB");
	$Mcb4 = new Breacker(1, 6, 6, "TP", "MCB");
	$Mcb5 = new Breacker(1, 6, 6, "TP", "MCB");

	$lsp = new LtSwitchgearPanel();
	$lsp->incoming[] = $Mcb1;
	$lsp->incoming[] = $Mcb2;
	$lsp->incoming[] = $Mcb3;
	$lsp->incoming[] = $Mcb4;
	$lsp->incoming[] = $Mcb5;

	echo "<pre>";

	print_r($lsp->incoming);
');

echo "<span style='color:blue;'>?&gt;</span>";

echo "<br><br>Result:<br>";

					?>
<pre>
Array
(
    [0] => Breacker Object
        (
            [number] => 1 Nos.
            [capacity] => 6 A
            [brackingCapacity] => 6 kA
            [pole] => TP
            [name] => MCB
        )

    [1] => Breacker Object
        (
            [number] => 1 Nos.
            [capacity] => 6 A
            [brackingCapacity] => 6 kA
            [pole] => TP
            [name] => MCB
        )

    [2] => Breacker Object
        (
            [number] => 1 Nos.
            [capacity] => 6 A
            [brackingCapacity] => 6 kA
            [pole] => TP
            [name] => MCB
        )

    [3] => Breacker Object
        (
            [number] => 1 Nos.
            [capacity] => 6 A
            [brackingCapacity] => 6 kA
            [pole] => TP
            [name] => MCB
        )

    [4] => Breacker Object
        (
            [number] => 1 Nos.
            [capacity] => 6 A
            [brackingCapacity] => 6 kA
            [pole] => TP
            [name] => MCB
        )

)
</pre>
				</content>
			</article>
			
		</div>
	</div>
	
	<footer class="mainfooter">
		<p>Copyright &copy; Sphinx 2017</p>
	</footer>

</body>
</html>