<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Home page
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
				<li class="active"><a href="index">Home</a></li>
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
			<!--Welcome message subsection-->
			<div class="row">
				<div class="col-sm-12">
					<h1>Welcome to the UHI Watersports Centre Shop!</h1>
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

			<!--Image carousel subsection-->
			<!--(w3schools 2014)-->
			<div class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="item active">
						<img src="images/carousel/windsurfing.png" alt="Image 1" style="width:100%;">
					</div>
					<div class="item">
						<img src="images/carousel/rafting.png" alt="Image 2" style="width:100%;">
					</div>
					<div class="item">
						<img src="images/carousel/jetskiing.png" alt="Image 3" style="width:100%;">
					</div>
				</div>
			</div>

			<!--News subsection-->
			<div class="row">
				<div class="col-sm-12">
					<h1>News</h1>

					<h2>22/03/2020 - Life Jackets Mk4 in high demand!</h2>
					<p>We have sold over 90% of our Life Jacket Mk4s! If you are interested in purchasing, be quick before they are all gone!</p>

					<h2>04/03/2020 - Swimming lessons</h2>
					<p>For anyone that is interested, we will be offering swimming lessons starting from next week on 11th of March at 13:00. We will be doing this every wednesday until winter time.

					<h2>23/02/2020 - New wetsuits available april</h2>
					<p>On 14th April 2020 we will be releasing a new range of lightweight and ultra-durable wetsuits. Make sure to check back here on the day to purchase as they will likely sell fast! All newsletter subscribers will receive an online catalogue on the release day.</p>
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
