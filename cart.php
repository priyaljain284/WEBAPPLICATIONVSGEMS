<?php
session_start();
require_once 'lib/dbcontroller.php';
$db_handle=new DBController();
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
	<div class="span12">
    	<div class="well well-small">
		<h1>Check Out <small class="pull-right"> n Items are in the cart </small></h1>
	<hr class="soften"/>
         
	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Price</th>
                  <th>Remove</th>
                  
				</tr>
              </thead>
              <tbody>
    <?php		
/* @var $item type */
                  foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["p_price"];
		?>
				<tr>
				<td><img src="<?php echo $item["p_image"]; ?>" class="cart-item-image" /><?php echo $item["p_name"]; ?></td>
				<td><?php echo $item["p_code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "Rs. ".$item["p_price"]; ?></td>
				<td  style="text-align:right;"><?php echo "Rs.  ". number_format($item_price,2); ?></td>
				<td style="text-align:center;">
                                    <a href="category.php?action=remove&p_code=<?php echo $item["p_code"]; ?>" class="btnRemoveAction"><img src="img/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
                                $total_price=$total_quantity="0";
				$total_quantity += $item["quantity"];
				$total_price += ($item["p_price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "rs.  ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr></tbody>
            </table><br/>
		
 		
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-inline">
				  <label style="min-width:159px"> VOUCHERS Code: </label> 
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="shopBtn"> ADD</button>
				</form>
				</td>
                </tr>
				
			</tbody>
				</table>
			<table class="table table-bordered">
			<tbody>
                <tr><td>ESTIMATE YOUR SHIPPING & TAXES</td></tr>
                 <tr> 
				 <td>
					<form class="form-horizontal">
					  <div class="control-group">
						<label class="span2 control-label" for="inputEmail">Country</label>
						<div class="controls">
						  <input type="text" placeholder="Country">
						</div>
					  </div>
					  <div class="control-group">
						<label class="span2 control-label" for="inputPassword">Post Code/ Zipcode</label>
						<div class="controls">
						  <input type="password" placeholder="Password">
						</div>
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <button type="submit" class="shopBtn">Click to check the price</button>
						</div>
					  </div>
					</form> 
				  </td>
				  </tr>
              </tbody>
            </table>		
	<a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

</div>
</div>
            
            
            <div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["p_price"];
		?>
				<tr>
				<td><img src="<?php echo $item["p_image"]; ?>" class="cart-item-image" /><?php echo $item["p_name"]; ?></td>
				<td><?php echo $item["p_code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["p_price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;">
                                    <a href="cart.php?action=remove&p_code=<?php echo $item["p_code"]; ?>" class="btnRemoveAction">
                                        <img src="img/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["p_price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
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
</div><!-- /container -->
</body>
</html>