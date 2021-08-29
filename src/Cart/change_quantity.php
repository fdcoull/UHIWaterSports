<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Change item quantity
*/

session_start();
include_once("../Database/env.php");

if (isset($_POST['item']) && isset($_POST['quantity']))
{
	$stockNo = $_POST['item'];
	$quantity = $_POST['quantity'];

	if (isset($_SESSION['cart']))
	{
		if (isset($_SESSION['cart'][$stockNo]))
		{
			$result = mysqli_query($conn, "SELECT stockno,qtyinstock FROM ESTOCK WHERE stockno='$stockNo';");
			if ($result)
			{
				if ($quantity > 0)
				{
					$row = mysqli_fetch_assoc($result);

					if ($row['qtyinstock'] >= $quantity)
					{
						$_SESSION['cart'][$stockNo] = $quantity;
						header("Location: ../../cart");
						exit();
					}
					else
					{
						header("Location: ../../cart_edit?id=$stockNo&alert=cartchangequantity7");
						exit();
					}
				}
				else
				{
					header("Location: ../../cart_edit?id=$stockNo&alert=cartchangequantity6");
					exit();
				}
			}
			else
			{
				header("Location: ../../cart_edit?id=$stockNo&alert=cartchangequantity5");
				exit();
			}
		}
		else
		{
			header("Location: ../../cart_edit?id=$stockNo&alert=cartchangequantity4");
			exit();
		}
	}
	else
	{
		header("Location: ../../cart_edit?id=$stockNo&alert=cartchangequantity3");
		exit();
	}
}
else
{
	header("Location: ../../cart?&alert=cartchangequantity2");
	exit();
}
