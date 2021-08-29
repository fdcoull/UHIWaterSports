<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Login user
*/

session_start();
include_once("../Database/env.php");

if (isset($_POST['email']) && isset($_POST['password']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT memberno,forename,surname,email,password FROM EMEMBER WHERE email='$email' AND password='$password';");
	$resultCount = mysqli_num_rows($result);
	if ($resultCount == 1)
	{
		$row = mysqli_fetch_assoc($result);

		$_SESSION['user'] = $row['memberno'];
		$_SESSION['userFullName'] = $row['forename'] . " " . $row['surname'];

		header("Location: ../../account?alert=loginalert1");
		exit();
	}
	else
	{
		header("Location: ../../login?alert=loginalert2");
		exit();
	}
}
else
{
	header("Location: ../../login?alert=loginalert3");
	exit();
}
