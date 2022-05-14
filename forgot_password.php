<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Forgot-Password</title>
	<style type="text/css"> 
	*
	{
		margin:0;
		padding:0;
		box-sizing:border-box;
	}
		body
		{
			 background:#E9EBEE;
		}
	   .man_div
	   {
		   width:100%;
		   height:100%!important;
		  
	   }
	   .contant
	   {
		   width:420px;
		   height:290px;
		   background:#fff;
            box-shadow:0 0 6px 1px gray;	
            margin:10% auto;	
			padding:10px;

	   }
	   .contant h2
	   {
			color: #6a6464;
			font-size: 22px;
			margin-left: 15px;
			font-family: cursive;
	   }
		.contant p
		{
			color: #afafaf;
			font-size: 17px;
			margin-left: 15px;
			margin-top: 15px;
			letter-spacing: 1px;
		}		
	   .contant input
	   {
		   width:90%;
		   height:37px;
		   color:black;
		   font-size:17px;
		   margin-top:25px;
		   margin:15px;
		   padding-left:10px;
		   border:none;
		   background:#e7e7e7;
		   outline:None;
	   }

		.contant input[type="submit"]
		{
		   width:120px;
		   height:35px;
		   background:#d56808 !important;
		   color:white;
		   font-size:17px;
		   border:none;
		   border-radius:4px;
		   margin-left:10px;
		   cursor:pointer;
		   float:right;
	   }
	   .contant input[type="submit"]:hover
	   {
		   background: #FF7800!important;
	   }
	</style>
</head>
<body>
<center><span style="background-color:orange; border:2px solid black; padding:4px; 	width:150px"><a href='index.html'>HOME</a></span></center>
		<br>
<?php
	require_once('connect.php');	
		if(isset($_POST['password_reset']))
		{
			$email=$_POST['email'];
			$email_query=mysqli_query($connect,"SELECT * FROM register_form WHERE email='$email'");
				if(mysqli_num_rows($email_query)==1)
				{
					$reset_token=bin2hex(random_bytes(26));
					$reset_date=date("Y-m-d");
					$reset_update="UPDATE register_form SET reset_token='$reset_token',reset_date='$reset_date' WHERE email='$email'";
					if(mysqli_query($connect,$reset_update))
					{
						header("location:recovery_pass.php?reset_token=$reset_token&reset_date=$reset_date");
					}					
				}
					else
					{
						echo "<script>
							alert('Email is not found');
						</script>";
					}
	}
?>

	<div class="man_div"> 
        <div class="contant"><br />
		   <h2>Find Your Account</h2><br /><hr style="width:390px; color:#d56808; margin-left:3px;" />
		   <p>Please enter your email address to search for your account.</p>
		   <form method="POST">
		    <input type="email" placeholder="Enter Your Email  Address" name="email" />
			<input type="submit" value="Find now" name="password_reset" />
			</form>
		</div>
	</div>
</body>
</html>