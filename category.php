<?php
session_start();
require_once 'lib/dbcontroller.php';
$db_handle=new DBController();


if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product_master WHERE p_code='" . $_GET["p_code"] . "'");
			$itemArray = array($productByCode[0]["p_code"]=>array('p_name'=>$productByCode[0]["p_name"], 'p_code'=>$productByCode[0]["p_code"], 'quantity'=>$_POST["quantity"], 'p_price'=>$productByCode[0]["p_price"], 'p_image'=>$productByCode[0]["p_image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["p_code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["p_code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
                            if ($_GET["p_code"] == $k) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                    }
		}
                if (empty($_SESSION["cart_item"])) {
                unset($_SESSION["cart_item"]);
            }
            break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Vidya Sagar Gems</title>
    <link href="CSS/mainstyle.css" rel="stylesheet"/>
    <link href="CSS/style.css" rel="stylesheet"/>
    <link href="CSS/categorystyle.css" rel="stylesheet"/>
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
				<a class="active" href="index.php"> <span class="icon-home"></span> Home</a> 
				<a href="#"><span class="icon-user"></span> My Account</a> 
                                <a href="register.php"><span class="icon-edit"></span>New User </a> 
                                <a href="contact_us.php"><span class="icon-envelope"></span> Contact us</a>
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
                            <li class="active"><a href="index.php">Home</a></li>
			  <li class=""><a href="#">Shop by Category</a></li>
			  <li class=""><a href="about_us.php">About Us</a></li>
                          <li class=""><a href="contact_us.php">Contact Us</a></li>
			  			</ul>
			
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="login.php"><span class="icon-lock"></span> Login <b class="caret"></b></a>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="register.php"><span class="icon-lock"></span> Register <b class="caret"></b></a>
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
        <?php
        /* @var $product_array type */
        $product_array = $db_handle->runQuery("SELECT * FROM product_master");
if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
?>
	<div class="product-item">
            <form method="post" action="cart.php?action=add&p_code=<?php echo $product_array[$key]["p_code"]; ?>">
		<div class="product-image"><img src="<?php echo $product_array[$key]["p_image"]; ?>"></div>
		<div class="product-tile-footer">
		<div class="product-title"><?php echo $product_array[$key]["p_name"]; ?></div>
		<div class="product-price">
                <?php echo "Rs. ".$product_array[$key]["p_price"]; ?></div>
                <div class="cart-action">
                <input type="text" class="product-quantity" name="quantity" value="1" size="2" />  
                <input type="submit" value="Add to Cart" class="btnAddAction" />
                
                </div>
                
		</div>
		</form>
	</div>
<?php
	}
}
?>
        
        
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="category.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
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
</div><!-- /co	ntainer -->
  </body>
</html>