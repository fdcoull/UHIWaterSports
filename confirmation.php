<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Order confirmation page
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

if (isset($_SESSION['user']))
{
	$orderNumber = $_GET['order'];

	$result = mysqli_query($conn, "SELECT memberno FROM EORDER WHERE orderno='$orderNumber';");


	if ($result)
	{
		$row = mysqli_fetch_assoc($result);
		$customerNumberEORDER = $row['memberno'];

		if ($row['memberno'] == $_SESSION['user'])
		{
			$customerNumber = $_SESSION['user'];
			$result = mysqli_query($conn, "SELECT memberno,forename,surname,street,town,postcode,email,category FROM EMEMBER WHERE memberno='$customerNumber';");
			$row = mysqli_fetch_assoc($result);
			$customerForename = $row['forename'];
			$customerSurname = $row['surname'];
			$customerStreet = $row['street'];
			$customerTown = $row['town'];
			$customerPostcode = $row['postcode'];
			$customerEmail = $row['email'];
			$customerCategory = $row['category'];
		}
		else
		{
			header("Location: login?alert=confirmationalert4");
			exit();
		}
	}
	else
	{
		header("Location: cart?alert=confirmationalert3");
		exit();
	}
}
else
{
	header("Location: login?alert=confirmationalert2");
	exit();
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
				<li><a href="cart"><span class="glyphicon glyphicon-shopping-cart"/></a></li>
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
				<div class="confirmation-head" align="center">
					<img src="images/confirmation/uhi_water_sports_centre_logo_text_bg.png" alt="UHI Watersports Centre Logo" class="confirmation-img"/>
				</div>
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
				<div class="col-sm-6">
					<table class="confirmation-table">
						<tr>
							<th>Order Number</th>
							<td><?PHP echo str_pad($orderNumber, 5, '0', STR_PAD_LEFT); ?></td>
						</tr>
						<tr>
							<th>Customer Number</th>
							<td><?PHP echo str_pad($customerNumber, 5, '0', STR_PAD_LEFT); ?></td>
						</tr>
						<tr>
							<th>Customer Forename</th>
							<td><?PHP echo $customerForename; ?></td>
						</tr>
						<tr>
							<th>Customer Surname</th>
							<td><?PHP echo $customerSurname; ?></td>
						</tr>
						<tr>
							<th>Customer Street</th>
							<td><?PHP echo $customerStreet; ?></td>
						</tr>
						<tr>
							<th>Customer Town</th>
							<td><?PHP echo $customerTown; ?></td>
						</tr>
						<tr>
							<th>Customer Postcode</th>
							<td><?PHP echo $customerPostcode; ?></td>
						</tr>
						<tr>
							<th>Customer Email</th>
							<td><?PHP echo $customerEmail; ?></td>
						</tr>
						<tr>
							<th>Customer Membership Category</th>
							<td><?PHP echo $customerCategory; ?></td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6" align="right">
					<h1>Order Confirmation</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table class="confirmation-table">
						<tr>
							<th>Item No.</th>
							<th>Item Name</th>
							<th>Price (ex VAT)</th>
							<th>Quantity</th>
							<th>Total (ex VAT)</th>
						</tr>
						<?PHP

						$resultOrder = mysqli_query($conn, "SELECT orderno,stockno,quantity FROM EORDERLINE WHERE orderno='$orderNumber';");
						$cartTotal = 0;

						while ($rowOrder = mysqli_fetch_assoc($resultOrder))
						{
							$itemQuantity = $rowOrder['quantity'];
							$itemNo = $rowOrder['stockno'];

							$resultItem = mysqli_query($conn, "SELECT * FROM ESTOCK WHERE stockno='$itemNo';");
							$rowItem = mysqli_fetch_assoc($resultItem);

							$itemName = $rowItem['description'];
							$itemPrice = $rowItem['price'];
							$itemTotal = $itemPrice * $itemQuantity;
							$cartTotal = $cartTotal + $itemTotal;

							echo "
								<tr>
									<td>$itemNo</td>
									<td>$itemName</td>
									<td>£" . number_format($itemPrice, 2) . "</td>
									<td>$itemQuantity</td>
									<td>£" . number_format($itemTotal, 2) . "</td>
								</tr>
							";
						}

						if ($customerCategory == "gold")
						{
							$discountTotal = $cartTotal * 0.2;
						}
						else if ($customerCategory == "silver")
						{
							$discountTotal = $cartTotal * 0.1;
						}
						else
						{
							$discountTotal = 0;
						}

						$vatTotal = ($cartTotal - $discountTotal) * 0.175;
						$grandTotal = ($cartTotal - $discountTotal) + $vatTotal;

						?>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<table class="confirmation-table">
						<tr>
							<th>Total</th>
							<td><?PHP echo "£" . number_format($cartTotal, 2); ?></td>
						</tr>
						<tr>
							<th>Discount</th>
							<td><?PHP echo "£" . number_format($discountTotal, 2); ?></td>
						</tr>
						<tr>
							<th>VAT</th>
							<td><?PHP echo "£" . number_format($vatTotal, 2); ?></td>
						</tr>
						<tr>
							<th>Grand Total</th>
							<td><u><?PHP echo "£" . number_format($grandTotal, 2); ?></u></td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6">
					<table class="confirmation-table">
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr align="right">
							<td><a class="btn btn-primary btn-block" onclick="print();" role="button">Print Page</a></td>
							<noscript>To print this page, press CTRL+P.</noscript>
						</tr>
						<tr align="right">
							<td><a class="btn btn-primary btn-block" href="index" role="button">Return To Home Page</a></td>
						</tr>
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
