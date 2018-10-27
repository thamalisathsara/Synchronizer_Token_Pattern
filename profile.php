<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

      
       
        <link rel="stylesheet"  href="/public/css/bootstrap.min.css">        
        <link rel="icon" type="image/png" href="/logo.png" sizes="30x30">
        <script src="/public/js/jquery-3.3.1.min.js"></script>
    </head>




    <body>
        <nav class="navbar navbar-light bg-light">
            <ul class="nav justify-content-end">
                <?php 
                    if(isset($_COOKIE['session_cookie'])) 
                    {
                        echo "<li class='nav-item'>
                                <a class='nav-link active' href='logout.php'>Logout</a>
                            </li>";
                    }
                ?>
            </ul>
        </nav>
        <div class="container">
            <div class="row" align="center" style="padding-top: 100px;">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Update Profile</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <script>
                                        //this function will retrive the CSRF token from the CSRF cookie
                                        function getCookie(cname) 
                                        {
                                            var name = cname + "=";
                                            var decodedCookie = decodeURIComponent(document.cookie);
                                            var ca = decodedCookie.split(';');
                                            for(var i = 0; i <ca.length; i++) 
                                            {
                                                var c = ca[i];
                                                while (c.charAt(0) == ' ') 
                                                {
                                                    c = c.substring(1);
                                                }
                                                if (c.indexOf(name) == 0) 
                                                {
                                                    return c.substring(name.length, c.length);
                                                }
                                            }
                                            return "";
                                        }
                                        //this function set hidden CSRF input's value in the form 
                                        function submitForm(oFormElement)
                                        {
                                            document.getElementById("csrf_Token").value=getCookie("csrf_Token");

                                        }
                                    </script>

                                    <?php
                                        //check whether user loged in or not 
                                        if(isset($_COOKIE['session_cookie'])) 
                                        {
                                            echo "
                <div class='limiter'>
		<div class='container-login100' style='background-image: url('images/back2.jpg');'>
			<div class='wrap-login100'>
				<form class='login100-form validate-form' action='endpoint.php' method='POST' onsubmit='submitForm(this);'>
					 <!-- CSRF Token -->
                                         <input type='hidden' name='csrf_Token' id='csrf_Token' value=''>   
                                         <!--  -->
					

					<span class='login100-form-title p-b-34 p-t-27'>
						Update Bio
					</span>

					<div class='wrap-input100 validate-input'>
						<input class='input100' type='text' id='name' name='name' placeholder='Full Name'>
						<span class='focus-input100' data-placeholder='' ></span>
					</div>

					<div class='wrap-input100 validate-input'>
						<input class='input100' type='text' id='university' name='university' placeholder='University'>
						<span class='focus-input100' data-placeholder='' ></span>
					</div>
					<div class='wrap-input100 validate-input'>
						<input class='input100' id='degree' name='degree' placeholder='Degree'>
						<span class='focus-input100' data-placeholder=''></span>
					</div>

					<div class='wrap-input100 validate-input' >
						<input class='input100' id='year' name='year' placeholder='Year'>
						<span class='focus-input100' data-placeholder=''></span>
					</div>

					<div class='container-login100-form-btn'>
						<button class='login100-form-btn' type='sumbit'>
							Update Info
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>";
                                        }
                                    ?>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="/public/js/bootstrap.min.js"></script>
        <script src="/public/js/popper.min.js"></script>
    </body>
</html>