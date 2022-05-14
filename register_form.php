<?php
// database connect
require_once 'connect.php';
session_start();
if (isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $input_error = array();

    if (empty($firstname)) {

        $input_error['firstname'] = "First Name is required";
    }
  
    if (empty($lastname)) {

        $input_error['lastname'] = "The lastname field is required";
    }
    if (empty($email)) {

        $input_error['email'] = "The email field is required";
    }
    if (empty($password)) {

        $input_error['password'] = "password field is required";
    }
    if (empty($c_password)) {

        $input_error['c_password'] = "confirm password field is required";
    }
    if(count($input_error)==0){
            $email_check= mysqli_query($connect, "SELECT * FROM `register_form` WHERE `email`='$email'");
				if(mysqli_num_rows($email_check)==0){
                   
                        if($password==$c_password){
                            $query = "INSERT INTO `register_form`(`firstname`, `lastname`, `email`,`password`) VALUES ('$firstname','$lastname','$email','$password')";
                            $result = mysqli_query($connect, $query);
                            if($result){
                                header('location:register_form.php');
                            }else{
                                $_SESSION['data_insert_error'] = "Register Failed";

                            }

                        }else{
                            $c_password_match = "Corfirm password do not match";
                        }
        					
	}
		else{
			            $email_error = " email address is already exists";
		}
	}

    }
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/login_form.png">
    <title>Register-Form</title>
    <link rel="stylesheet" href="css/register.css">
	<style> 
	@media screen and (max-width: 600px) {
	.double_input{
		grid-template-columns:1fr;
	}
	.form{
		width:360px;
	}										}
	</style>
</head>
<body>
   <div class="container">
   <center><span style="background-color:orange; border:2px solid black; padding:4px; 	width:150px"><a href='index.html'>HOME</a></span></center>
		<br>
        <form action="" class="form" method="POST">
            <h1 class="form__title">Admin <span style="color:#d56808">R</span>egister</h1>
			
		<div class="double_input">
            <div class="form__div">
                <input type="text" class="form__input" placeholder=" "
                name="firstname" value="<?php if(isset($firstname)){echo $firstname;}?>">
                <label for="" class="form__label">First Name</label><br /><br />
				<p class="error_msg"><?php if(isset($input_error['firstname'])){ echo $input_error['firstname']; }?></p>
                
            </div>
       			
			<div class="form__div">
                <input type="text" class="form__input" placeholder=" " name="lastname" value="<?php if(isset($lastname)){echo $lastname;}?>" >
                <label for="" class="form__label">Last Name</label><br /><br />
				<p class="error_msg"><?php if(isset($input_error['lastname'])){ echo $input_error['lastname']; }?></p>
            </div>
		</div>
			 <div class="form__div">
                <input type="email" class="form__input" placeholder=" " name="email" value="<?php if(isset($email)){echo $email;}?>" >
                <label for="" class="form__label">Email</label><br /><br />
				<p class="error_msg"><?php error_reporting(0); if(isset($input_error['email']) || isset($email_error)){ echo $input_error['email'];echo $email_error;} ?></p>
            </div>		
			<div class="double_input">
			 <div class="form__div">
                <input type="password" class="form__input" placeholder=" " name="password" value="<?php if(isset($password)){echo $password;}?>">
                <label for="" class="form__label">Password</label><br /><br />
				<p class="error_msg"><?php if(isset($input_error['password'])){ echo $input_error['password'];}?></p>
            </div>
			 <div class="form__div">
                <input type="password" class="form__input" placeholder=" " name="c_password" value="<?php if(isset($c_password)){echo $c_password;}?>">
                <label for="" class="form__label">Confirm Password</label><br /><br /> 
				<p class="error_msg"><?php if(isset($input_error['c_password'])){ echo $input_error['c_password'];}?></p>
				<p class="error_msg"><?php if(isset($c_password_match)){ echo $c_password_match;}?></p>
            </div>
            </div>
			<p class="new_account">Already have an account?<a href="login_form.php" target="blank" > sign-in</a></p>
            <input type="submit" class="form__button" value="Register" name="register">
        </form>
    </div>
  <br /> 
</body>
</html>