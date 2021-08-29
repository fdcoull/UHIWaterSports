<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Remove item from cart
*/

session_start();

$itemNo = $_GET['id'];

if (count($_SESSION['cart']) == 1)
{
	unset($_SESSION['cart']);
}
else
{
	unset($_SESSION['cart'][$itemNo]);
}

header("Location: ../../cart");
exit();
