<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Shopping cart page
*/

//Page requirement initiation
session_start();
include_once("src/Database/env.php");
include_once("src/Alerts/alerts.php");

if (isset($_SESSION['userFullName']))
{
	$loginInfo = "Logged in as " . $_SESSION['userFullName'];
}
else
{
	$loginInfo = "Not logged in";
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<!--Site info-->
	<title>UHI Watersports</title>
	<link rel="icon" href="images/favicon.ico">

	<!--Meta info-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Stylesheet sources-->
	<link rel="stylesheet" type="text/css" href="fonts/fonts.css"/>
	<link rel="stylesheet" href="libraries/bootstrap-3.4.1-dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/global.css"/>

	<!--Pre-load script sources-->
	<script src="libraries/jquery-3.4.1/js/jquery-3.4.1.min.js"></script>
	<script src="libraries/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
	<!--Navbar section-->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index" class="navbar-brand" href="#" style="padding:5px 20px;">
					<img src="images/logoWithText.png" alt="Logo" style="max-height:100%;"/>
				</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index">Home</a></li>
				<li><a href="about">About Us</a></li>
				<li><a href="shop">Shop</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="cart"><span class="glyphicon glyphicon-shopping-cart"/></a></li>
				<li><a href="account"><span class="glyphicon glyphicon-user" title="<?PHP echo $loginInfo; ?>"/></a></li>
			</ul>
		</div>
	</nav>

	<!--Main body section-->
	<div class="container-fluid">
		<div class="body-main">
			<!--Page title subsection-->
			<div class="row">
				<div class="col-sm-12">
					<h1>My Shopping Cart</h1>
				</div>
			</div>

			<!--Error section (Javascript enabled)-->
			<div id="alert" class="alert-fade">
				<div class="alert-content">
					<div class="alert-box">
						<div class="row">
							<div class="col-sm-12" align="right">
								<div class="alert-head">
									<input type="button" class="btn btn-primary" value="X" onclick="alertHide()"/>
								</div>
							</div>
							<div class="col-sm-4" align="center">
								<span class="glyphicon glyphicon-exclamation-sign alert-icon"/>
							</div>
							<div class="col-sm-8">
								<div class="alert-panel">
								<p>Error:</p>
								<p><?PHP

								if (isset($errorMessage))
								{
									echo $errorMessage;
								}

								?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Error section (Javascript disabled)-->
			<noscript>
			<?PHP

			if (isset($errorMessage))
			{
				echo $errorMessageNoJS;
			}

			?>
			</noscript>

			<!--Notification section-->
			<?PHP

			if (isset($notificationMessage))
			{
				echo $notificationMessageNoJS;
			}

			?>

			<!--Page content subsection-->
			<div class="row">
				<div class="col-sm-12">
					<table>
						<?PHP

						if (isset($_SESSION['cart']))
						{
							$cart = $_SESSION['cart'];
							$cartCount = count($cart);
							$cartTotal = 0;

							echo "
								<tr>
									<th/>
									<th>Item Name</th>
									<th>Price (ex VAT)</th>
									<th>Quantity</th>
									<th>Total (ex VAT)</th>
								</tr>
							";

							for ($i = 0; $i < $cartCount; $i++)
							{
								if ($i == 0)
								{
									//(w3schools 2006)
									$itemQuantity = reset($cart);
									$itemNo = key($cart);
								}
								else
								{
									//(w3schools 2006)
									$itemQuantity = next($cart);
									$itemNo = key($cart);
								}

								$result = mysqli_query($conn, "SELECT * FROM ESTOCK WHERE stockno='$itemNo';");
								$row = mysqli_fetch_assoc($result);


								$itemName = $row['description'];
								$itemPrice = $row['price'];
								$itemTotal = $itemPrice * $itemQuantity;
								$cartTotal = $cartTotal + $itemTotal;

								echo "
									<tr>
										<td><img src=\"images/products/$itemNo.png\" class=\"cart-img\"/></td>
										<td>$itemName</td>
										<td>£" . number_format($itemPrice, 2) . "</td>
										<td>$itemQuantity <a href=\"cart_edit?id=$itemNo\">(Change)</a></td>
										<td>£" . number_format($itemTotal, 2) . "</td>
										<td><a href=\"src/Cart/remove_item?id=$itemNo\" role=\"button\"><span class=\"glyphicon glyphicon-trash\"/></a></td>
									</tr>
								";
							}

							echo "
								<tr>
									<td/><td/><td/><td/>
									<td><u>£" . number_format($cartTotal, 2) . "</u></td>
								</tr>
								<tr>
									<td/><td/><td/>
									<td><a class=\"btn btn-primary\" href=\"src/Cart/empty_cart\" role=\"button\"><span class=\"glyphicon glyphicon-trash\"/></a></td>
									<td><a class=\"btn btn-primary\" href=\"src/Order/place_order\" role=\"button\">Place Order</a></td>
								</tr>
							";

						}
						else
						{
							echo "
								<tr align=\"center\">
									<td class=\"cart-empty-cells\">There are no items in your shopping cart. Click <a href=\"shop\">here</a> to browse our range!</td>
								</tr>
							";
						}

						?>
					</table>
				</div>
			</div>
			<hr/>

			<!--Footer subsection-->
			<div class="footer">
				<div class="row">
					<div class="col-sm-12">
						<p>Copyright &copy; UHI Watersports Centre. All rights reserved. Website designed and created by Finlay Daniel Coull.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--Post-load script sources-->
<script src="js/alert.js"></script>
<script>

<?PHP

if (isset($errorMessage))
{
	echo $errorMessageJS;
}

?>

</script>
</body>
</html>
