<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recovery-Password</title>
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
		   font-size:15px;
		   margin-top:25px;
		   margin:15px;
		   padding-left:10px;
		   font-weight:bold;
		   border:none;
		   background:#e7e7e7;
		   outline:None;
	   }
	   .contant input:focus
	   {
		   font-size:17px;
	   }
		.contant input[type="submit"]
		{
		   width:160px;
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
<?php
	require_once('connect.php');
		error_reporting(0);
		$reset_token=$_GET['reset_token'];
		$reset_date=date("Y-m-d");
			if(isset($reset_token)&&isset($reset_date))
			{
					$query="SELECT * FROM register_form WHERE reset_token='$reset_token' AND reset_date='$reset_date'";
					$result=mysqli_query($connect,$query);
						if(mysqli_num_rows($result)==1)
						{
							if(isset($_POST['password_reset']))
							{
								$password=$_POST['password'];
								$update_pass="UPDATE `register_form` SET `password`='$password',`reset_token`='NULL',`reset_date`='NULL' WHERE reset_token='$reset_token'";				
								if(mysqli_query($connect,$update_pass))
								{
									echo "<script> 
											alert('Password Updated Succesfuly');
											window.location.href='login_form.php';
										</script>";
								}
							}
						}
						else
						{
							echo "<script> 
								alert('Invalid or Expired link');
								window.location.href='login_form.php';
							</script>";
						}
			}
		else
		{
			echo 
				"<script> 
					alert('Server Down! try again Later');
					window.location.href='login_form.php';
				</script>";
		}
		
?>
	<div class="man_div"> 
        <div class="contant">
		<br /> 
		   <h2>Reset Your Password</h2>
		   <br />
		   <hr style="width:390px; color:red; margin-left:3px;" />
		   <p>Please enter your new password.</p>
		   <form method="POST">
				<input type="password" placeholder="Enter Your new password" name="password" />
				<input type="submit" value="Reset Password" name="password_reset" />
			</form>
		</div>	
	</div>
</body>
</html>