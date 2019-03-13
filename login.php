<!DOCTYPE html>

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="vs_gems";

try{
    $conn= mysqli_connect($servername, $username, $password, $dbname);
    echo "(Connection Successful)";
    
} catch (Exception $ex) {

    echo "(Error in connection)";
}

if(isset($_POST['loginsubmit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $register_query=("SELECT * FROM vs_Registration WHERE email='$email' AND password='$password'")
            or die("Failed to query database ".mysqli_error());
    $row= mysqli_fetch_array($register_query);
    
    
    try{
        if($row['email']==$email && $row['password']==$password){
                echo "login successful";
             $_SESSION['email']=$email;
             $_SESSION['password']=$password;
                header("Location: index.php");
                
        }
            else {
                    
                echo "Error in login";
            }
        
    } catch (mysqli_sql_exception $ex) {

        echo "error in connection";
    }
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Vidya Sagar Gems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="CSS/mainstyle.css" rel="stylesheet"/>
    <link href="CSS/style.css" rel="stylesheet"/>
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
	
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a class="active" href="index.html"> <span class="icon-home"></span> Home</a> 
				<a href="#"><span class="icon-user"></span> My Account</a> 
				<a href="#"><span class="icon-edit"></span>New User </a> 
				<a href="#"><span class="icon-envelope"></span> Contact us</a>
							</div>
		
	</div>
</div>

<!--
Lower Header Section 
-->

<div id="gototop"> </div>
<header id="header">
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="index.html">Home	</a></li>
			  <li class=""><a href="#">Shop by Category</a></li>
			  <li class=""><a href="#">About Us</a></li>
			  <li class=""><a href="#">Contact Us</a></li>
			  			</ul>
			
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm">
				  <div class="control-group">
					<input type="text" class="span2" id="inputEmail" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" id="inputPassword" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
                                      <button type="submit" class="shopBtn btn-block">Sign in</button>
				  </div>
				</form>
				</div>
			</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->
<div class="row">
	<div class="container">
	<div class="span4">&nbsp </div>
		<div class="span5">
			<div class="well">
			<h3>Login Details</h3></br>
                        <form method="post">
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Email-id</label>
				<div class="controls">
                                    <input class="span3"  type="email" placeholder="Email" name="email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
                                    <input type="password" class="span3" placeholder="Password" name="password">
				</div>
			  </div>
			  </br>
			  <div class="control-group">
				<div class="controls">
                                    <input type="submit" class="defaultBtn" name="loginsubmit" value="Sign In">
				  </br>
				  <a href="forget_password.html">Forget password?</a>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
<!--
Footer
-->
<footer class="footer">
<div class="row-fluid">
<div class="span3">
<h3>Seema Jain</h3>
<h5>8504995317</h5>
<h5>vidyasagargems@gmail.com</h5>
 </div>
 <div class="span3">
<h5>Vidya Sagar Gems</h5>
74, Chandra Nagar<br>
Gopal Pura Circle<br>
Tonk Road<br>
Jaipur - 302018, Rajasthan<br>
 </div>
 </div>
</footer>
</div><!-- /container -->


<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
  </body>
</html>