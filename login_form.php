<?php 
// database connect
require_once 'connect.php';
	if(isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];		
		$login_username_check= mysqli_query($connect,"SELECT * FROM `register_form` WHERE `email`='$email' AND password='$password'");
		if(mysqli_num_rows($login_username_check)==1)
		{
				echo "<script> 
				alert('Login Successful!');				
			</script>";
				// header("location:register_form.php");
			}			
		else
		{
			echo "<script> 
				alert('Login Faild!');				
			</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<center><span style="background-color:orange; border:2px solid black; padding:4px; 	width:150px"><a href='index.html'>HOME</a></span></center>
		<br>
 <title>Admin Login--Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"/>
	
	<link rel="stylesheet" type="text/css" href="css/login_form.css" media="all" />
</head>
<body>
 <div class="container">
	<div class="d-flex justify-content-center">
			<div class="user_card">
			<div class="d-flex justify-content-center form_container">
				<form method="POST">
					<h1>Admin Login</h1>
					<div class="input-group mb-3">
						<div class="input-group-append">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control input_user" placeholder="Enter Your email">
					</div>
					<div class="input-group mb-2">
						<div class="input-group-append">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control input_pass" placeholder="password">
					</div>
					<p>
						<a href="forgot_password.php"  id="forgot_pass">Forgot Password ?</a>
					</p>
					<input type="submit" value="Login" class="btn login_btn" name="login" />
					<p id="not_account">
						Don't have an any account? <a href="register_form.php">Sign-up</a>
					</p>	
				</form>
			</div>
			</div>
		</div>
	</div>
</body>
</html>