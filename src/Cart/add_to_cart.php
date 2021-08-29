<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Add to cart
*/

session_start();

include_once("../Database/env.php");

if (isset($_POST['stockNo']) && isset($_POST['quantity']))
{
	$stockNo = $_POST['stockNo'];
	$quantity = $_POST['quantity'];

	$result = mysqli_query($conn, "SELECT stockno,qtyinstock FROM ESTOCK WHERE stockno='$stockNo';");
	if ($result)
	{
		if ($quantity > 0)
		{
			$row = mysqli_fetch_assoc($result);

			if (isset($_SESSION['cart'][$stockNo]))
			{
				$newQuantity = $_SESSION['cart'][$stockNo];
			}
			else
			{
				$newQuantity = 0;
			}

			if ($row['qtyinstock'] >= $newQuantity + $quantity)
			{
				if (isset($_SESSION['cart'][$stockNo]))
				{
					$_SESSION['cart'][$stockNo] = $_SESSION['cart'][$stockNo] + $quantity;
					header("Location: ../../item?id=$stockNo&alert=cartalert1");
					exit();
				}
				else if (!isset($_SESSION['cart']) || count($_SESSION['cart']) < 3)
				{
					$_SESSION['cart'][$stockNo] = $quantity;
					header("Location: ../../item?id=$stockNo&alert=cartalert1");
					exit();
				}
				else
				{
					header("Location: ../../item?id=$stockNo&alert=cartalert3");
					exit();
				}
			}
			else
			{
				header("Location: ../../item?id=$stockNo&alert=cartalert5");
				exit();
			}
		}
		else
		{
			header("Location: ../../item?id=$stockNo&alert=cartalert6");
			exit();
		}
	}
	else
	{
		header("Location: ../../item?id=$stockNo&alert=cartalert4");
		exit();
	}
}
else
{
	header("Location: ../../item?id=$stockNo&alert=cartalert2");
	exit();
}
