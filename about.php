<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
About page
*/

//Page requirement initiation
session_start();
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
				<li class="active"><a href="about">About Us</a></li>
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
					<h1>About Us</h1>
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
					<p>Welcome to our online shop! We offer a range of products so feel free to have a browse. If you are interested in partaking in some water sport activites, just come to the centre between 9:00 and 15:00. No bookings are required.</p>
					<p>We are a small local water sports centre based just outside of inverness by the canal. Enjoy the great views of the highlands whilst taking part in one of our spectacular activities.</p>
					<img src="images/about/river.png" alt="Inverness river" class="about-img"/>
				</div>
				<div class="col-sm-6">
					<img src="images/about/canal.png" alt="Inverness canal" class="about-img"/>
					<p>Activities we offer:</p>
					<ul class="about-ul">
						<li>Boat Hire</li>
						<li>Canoing</li>
						<li>Jetskiing</li>
						<li>Surfing</li>
						<li>Waterskiing</li>
						<li>White Water Rafting</li>
						<li>Windsurfing</li>
					<ul>
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
