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

if(isset($_POST['submitAccount'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $register_query="INSERT INTO vs_Registration VALUES('$fname','$lname','$mobile','$email','$password')";
    
    try{
        $register_result=mysqli_query($conn,$register_query);
        if($register_result){
            if(mysqli_affected_rows($conn)>0){
                echo "registration successful";
                header("Location: index.php");
            }
            else {
                    
                echo("Error in registration");
            }
        }
    } catch (mysqli_sql_exception $ex) {

        echo("error in connection");
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
			  <li class="active"><a href="index.html">Home</a></li>
			  <li class=""><a href="#">Shop by Category</a></li>
			  <li class=""><a href="about_us.html">About Us</a></li>
			  <li class=""><a href="#">Contact Us</a></li>
			  			</ul>
			
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="login.html"><span class="icon-lock"></span> Login <b class="caret"></b></a>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="register.html"><span class="icon-lock"></span> Register <b class="caret"></b></a>
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
	<div class="span3">&nbsp </div>
		<div class="span8">
			<div class="well">
			<h3>Create Account</h3></br>
                        <form class="form-horizontal" action="" method="post">
				<div class="control-group">
			<label class="control-label" for="inputFname">First name <sup>*</sup></label>
			<div class="controls">
                            <input type="text" id="inputFname" placeholder="First Name" name="fname" required="true">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Last name <sup>*</sup></label>
			<div class="controls">
                            <input type="text" id="inputLname" placeholder="Last Name" name="lname" required="true">
			</div>
		 </div>
		 <div class="control-group">
		<label class="control-label" for="inputMobile">Mobile Number <sup>*</sup></label>
		<div class="controls">
                    <input type="tel" placeholder="Mobile" name="mobile" required="true">
		</div>
	  </div>	
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
                    <input type="email" placeholder="Email" name="email" required="true">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
                    <input type="password" placeholder="Password" name="password" required="true">
		</div>
	  </div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
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
  </body>
</html>