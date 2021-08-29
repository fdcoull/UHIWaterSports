<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Place order
*/

session_start();
include_once("../Database/env.php");

if (isset($_SESSION['user']))
{
	if (isset($_SESSION['cart']))
	{
		if (count($_SESSION['cart']) <= 3)
		{
			$cart = $_SESSION['cart'];
			$cartCount = count($cart);
			$isEnoughStock = true;
			$isQuantityValid = true;

			for ($i = 0; $i < $cartCount; $i++)
			{
				if ($i == 0)
				{
					$itemQuantity = reset($cart);
				}
				else
				{
					$itemQuantity = next($cart);
				}

				$itemNo = key($cart);
				$result = mysqli_query($conn, "SELECT stockno,qtyinstock FROM ESTOCK WHERE stockno='$itemNo';");
				$row = mysqli_fetch_assoc($result);

				if ($itemQuantity < 1)
				{
					$isQuantityValid = false;
				}
				if ($row['qtyinstock'] < $itemQuantity)
				{
					$isEnoughStock = false;
				}
			}

			if ($isQuantityValid == true)
			{
				if ($isEnoughStock == true)
				{
					$result = mysqli_query($conn, "SELECT orderno FROM EORDER ORDER BY orderno DESC LIMIT 1;");
					$resultCount = mysqli_num_rows($result);
					if ($resultCount == 1)
					{
						$row = mysqli_fetch_assoc($result);
						$orderNumberLastEORDER = $row['orderno'];
					}
					else
					{
						$orderNumberLastEORDER = 0;
					}

					$result = mysqli_query($conn, "SELECT orderno FROM EORDERLINE ORDER BY orderno DESC LIMIT 1;");
					$resultCount = mysqli_num_rows($result);
					if ($resultCount == 1)
					{
						$row = mysqli_fetch_assoc($result);
						$orderNumberLastEORDERLINE = $row['orderno'];
					}
					else
					{
						$orderNumberLastEORDERLINE = 0;
					}

					if ($orderNumberLastEORDER == $orderNumberLastEORDERLINE)
					{
						$orderNumber = $orderNumberLastEORDER + 1;
						$customerNumber = $_SESSION['user'];

						for ($i = 0; $i < $cartCount; $i++)
						{
							if ($i == 0)
							{
								$itemQuantity = reset($cart);
								$itemNo = key($cart);
							}
							else
							{
								$itemQuantity = next($cart);
								$itemNo = key($cart);
							}

							$result = mysqli_query($conn, "INSERT INTO EORDERLINE (orderno,stockno,quantity) values ('$orderNumber','$itemNo','$itemQuantity');");

							mysqli_query($conn, "UPDATE ESTOCK SET qtyinstock=qtyinstock-$itemQuantity WHERE stockno='$itemNo';");
						}

						if ($result)
						{

							$result = mysqli_query($conn, "INSERT INTO EORDER (orderno, memberno) values ('$orderNumber','$customerNumber');");
							if ($result)
							{
								header("Location: ../../confirmation?order=$orderNumber");
								unset($_SESSION['cart']);
							}
							else
							{
								header("Location: ../../cart?alert=orderalert6");
							}
						}
						else
						{
							header("Location: ../../cart?alert=orderalert5");
						}
					}
					else
					{
						header("Location: ../../cart?alert=orderalert4");
					}
					exit();
				}
				else
				{
					header("Location: ../../cart?alert=orderalert8");
					exit();
				}
			}
			else
			{
				header("Location: ../../cart?alert=orderalert9");
				exit();
			}
		}
		else
		{
			header("Location: ../../cart?alert=orderalert7");
			exit();
		}
	}
	else
	{
		header("Location: ../../cart?alert=orderalert3");
		exit();
	}
}
else
{
	header("Location: ../../cart?alert=orderalert2");
	exit();
}
