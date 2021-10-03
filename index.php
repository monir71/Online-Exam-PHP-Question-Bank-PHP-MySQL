<?php
	ini_set('display_errors', 'off');
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login : Test</title>
		<link href="style_login.css" rel="stylesheet" type="text/css">
	</head>
<body>
	 <div class="main">
		<div class="login-form">
			<h1 style="color:#0B6FC5; letter-spacing:2px;">Welcome!</h1>
				<form action="index.php" method="POST">
					<input name="user_name" type="text" class="text" placeholder="Username" required autocomplete="off" />
					<input name="pass" type="password" placeholder="Password" required/>
					<div class="submit">
						<input type="submit" name="try_login" value="LOGIN" />
					</div>	
					
					<?php
						$txt = "";
						if(isset($_POST['try_login'])) {
							if(get_authen(htmlspecialchars($_POST['user_name']), htmlspecialchars($_POST['pass'])) == "OK") {
								$_SESSION['user'] = $_POST['user_name'];
								$_SESSION['pass'] = $_POST['pass'];
								echo '<meta http-equiv="refresh" content="0; URL=Home.php">';
							} else {
								echo '<p style="background:linear-gradient(to bottom, red 0%, white 50%, red 100%); border-radius:5px; color:red; padding:8px; font-size:12px; font-weight:bolder; letter-spacing:2px;">' . get_authen(htmlspecialchars($_POST['user_name']), htmlspecialchars($_POST['pass'])) . '</p>';
							}
						}
					?>
					
				</form>
			</div>
   					<div class="copy-right">
						<p>Copyright &copy; Sphinx 2017</p>
					</div>
				<!-----//end-copyright---->
		</div>
		<!---728x90--->
		
		<?php
			//Required PHP function for authentication
			function get_authen($id, $pass) {
				$mysqli = new mysqli("localhost", "root", "", "question_bank", 3306) or die("Server Error!");
				
				$sql = 'SELECT * FROM authen WHERE nameuser=?';
				if($stmt = $mysqli->prepare($sql))
				{
					$stmt->bind_param('s', $id);
					$stmt->execute();
					$stmt->store_result();
					if($stmt->num_rows < 1)
					{
						$stmt->close();
						return "Invalid Username!";
					}
					$stmt->close();
				}

				$sql = 'SELECT * FROM authen WHERE nameuser=? AND wordname =?';
				if($stmt = $mysqli->prepare($sql))
				{
					$stmt->bind_param('ss', $id, $pass);
					$stmt->execute();
					$stmt->store_result();
					if($stmt->num_rows < 1)
					{
						$stmt->close();
						return "Invalid Password!" . '<a style="background:linear-gradient(to bottom, red 0%, white 50%, red 100%); color:blue; padding:8px; font-size:12px;" href=""> &nbsp; &nbsp; Forgot Password?</a>';
					}
					$stmt->close();
				}
					return "OK";				
			}
		?>

</body>
</html>