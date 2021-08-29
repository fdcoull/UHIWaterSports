<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Alert window PHP
*/

if (isset($_GET['alert']))
{
	$alertID = $_GET['alert'];

	$json = file_get_contents('src/Alerts/alerts_list.json');
	$alertsList = json_decode($json);

	if ($alertsList->$alertID[0] == 1)
	{
		$notificationMessage = $alertsList->$alertID[1];
		$notificationMessageNoJS = "<div class=\"alert alert-success\" role=\"alert\">$notificationMessage</div>";
	}
	else
	{
		$errorMessage = $alertsList->$alertID[1];
		$errorMessageJS = "alertShow();";
		$errorMessageNoJS = "<div class=\"alert alert-danger\" role=\"alert\">$errorMessage</div>";
	}
}
