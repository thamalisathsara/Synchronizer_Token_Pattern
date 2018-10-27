<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Assigment_02</title>
      
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
		error_reporting(0);
                ?>
            </ul>
        </nav>
        <div class="container">
            <div class="row" align="center" style="padding-top: 100px;">
                <div class="col-12">
                    <div class="card">
                        <h3 class="card-header">Profile Details Updated</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
            						<?php
                						if(isset($_COOKIE['session_cookie']))
                						{
                							session_start();
                						      //check whether the token in the post method equals to the token in the session
                                        				if ($_POST['csrf_Token'] == $_COOKIE['csrf_Token']) 
                							{
                								$fname=$_POST['name'];
                								$university=$_POST['university'];
                								$degree=$_POST['degree'];
                								$year=$_POST['year'];

										echo"<table id='customers'>
  											<tr>
    												<td>Full Name : </td>
    												<td> $fname</td>
  											</tr>
  											<tr>
    												<td>University : </td>
    												<td>$university</td>
  	  
  											</tr>
  											<tr>
    												<td>Degree : </td>
   										 		<td>$degree</td>
    
  											</tr>
  											<tr>
    												<td>Year    : </td>
    												<td>$year</td>
    
  											</tr>	

										</table>								
											";
                							}
                							else
                							{
                								echo "<script>alert('WARNING :: CSRF Attempt Detected!!!')</script>";
                							}
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