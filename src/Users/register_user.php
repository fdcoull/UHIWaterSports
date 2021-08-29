<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Register user
*/

session_start();
include_once("../Database/env.php");

if (isset($_SESSION['user']))
{
	header("Location: ../../register?alert=registeralert2");
	exit();
}
else
{
	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirm']) && isset($_POST['forename']) && isset($_POST['surname']) && isset($_POST['street']) && isset($_POST['town']) && isset($_POST['postcode']) && isset($_POST['category']))
	{
		if ($_POST['password'] == $_POST['passwordConfirm'])
		{
			$email = $_POST['email'];

			$result = mysqli_query($conn, "SELECT email FROM EMEMBER WHERE email='$email';");
			$resultCount = mysqli_num_rows($result);

			if ($resultCount == 0)
			{
				$password = $_POST['password'];
				$forename = $_POST['forename'];
				$surname = $_POST['surname'];
				$street = $_POST['street'];
				$town = $_POST['town'];
				$postcode = $_POST['postcode'];
				$category = $_POST['category'];

				$result = mysqli_query($conn, "INSERT INTO EMEMBER (forename,surname,street,town,postcode,email,password,category) values ('$forename','$surname','$street','$town','$postcode','$email','$password','$category');");

				if ($result)
				{
					header("Location: ../../login?alert=registeralert1");
					exit();
				}
				else
				{
					header("Location: ../../register?alert=registeralert6");
					exit();
				}
			}
			else
			{
				header("Location: ../../register?alert=registeralert5");
				exit();
			}
		}
		else
		{
			header("Location: ../../register?alert=registeralert4");
			exit();
		}
	}
	else
	{
		header("Location: ../../register?alert=registeralert3");
		exit();
	}
}
