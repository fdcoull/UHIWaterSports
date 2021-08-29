<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Account page
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

if (!isset($_SESSION['user']))
{
	header("Location: login");
	exit();
}
else
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
				<li class="active"><a href="account"><span class="glyphicon glyphicon-user" title="<?PHP echo $loginInfo; ?>"/></a></li>
			</ul>
		</div>
	</nav>

	<!--Main body section-->
	<div class="container-fluid">
		<div class="body-main">
			<!--Page title subsection-->
			<div class="row">
				<div class="col-sm-12">
					<h1>My Account</h1>
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
					<h2>Hello, <?PHP echo $customerForename; ?></h2>
					<table>
						<tr>
							<td>Customer Number: </td>
							<td><?PHP echo str_pad($customerNumber, 5, '0', STR_PAD_LEFT); ?></td>
						</tr>
						<tr>
							<td>Forename: </td>
							<td><?PHP echo $customerForename; ?></td>
						</tr>
						<tr>
							<td>Surname: </td>
							<td><?PHP echo $customerSurname; ?></td>
						</tr>
						<tr>
							<td>Street: </td>
							<td><?PHP echo $customerStreet; ?></td>
						</tr>
						<tr>
							<td>Town: </td>
							<td><?PHP echo $customerTown; ?></td>
						</tr>
						<tr>
							<td>Postcode: </td>
							<td><?PHP echo $customerPostcode; ?></td>
						</tr>
						<tr>
							<td>Email Address: </td>
							<td><?PHP echo $customerEmail; ?></td>
						</tr>
						<tr>
							<td>Member Category: </td>
							<td><?PHP echo $customerCategory; ?></td>
						</tr>
						<tr>
							<td>
								<a class="btn btn-primary" href="src/Users/logout_user" role="button">Log Out</a>
							</td>
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
