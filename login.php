<!doctype html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet"  href="/public/css/bootstrap.min.css">    
    <link rel="icon" type="image/png" href="/logo.png" sizes="30x30">
    <script src="/public/js/jquery-3.3.1.min.js"></script>

	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

  </head>
  <body >
    
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/back2.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="login.php" method="POST" enctype='multipart/form-data'>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" id="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="submit" name="submit">
							Login
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>


    
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/popper.min.js"></script>
  </body>
</html>

<?php

  if(isset($_POST['submit']))
  {
    
		login();
	}
?>

<?php
	function login()
	{

		$email='testmail@test.com';
		$password='admin';

		$input_email = $_POST['email'];
		$input_pwd = $_POST['password'];
		//check whether credentials match
		if(($input_email == $email)&&($input_pwd == $password))
		{

			session_set_cookie_params(300);
			session_start();
			session_regenerate_id();
		  
			setcookie('session_cookie', session_id(), time() + 300, '/');
       //generate CSRF Token
			$Token = generate_token();
			
	   //storing CSRF Token locally
			$filename = getcwd().'\tokens\\'.session_id().".txt";
			$TokenFile = fopen($filename, "w") or die("Unable to Create Token");
			fwrite($TokenFile, $Token);
			fclose($TokenFile);
       //set CSRF cookie with secure flag set
			setcookie('csrf_Token', $Token, time() + 300, '/','www.testmail.com.com',true);
	   //rdirect to profile.php
			header("Location:profile.php");
			exit;		
		}
		else
		{
      //if credentials doesn't match
			echo "<script>alert('Invalid Credentials!')</script>";
		}
	}
	
  function generate_token()
	{
    //generate CSRF token and return it
	  return sha1(base64_encode(openssl_random_pseudo_bytes(30)));
	}


?>
