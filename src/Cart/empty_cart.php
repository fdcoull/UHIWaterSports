<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Empty cart
*/

session_start();

unset($_SESSION['cart']);

header("Location: ../../cart");
exit();
