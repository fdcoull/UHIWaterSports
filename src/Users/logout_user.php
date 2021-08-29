<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Logout user
*/

session_start();

unset($_SESSION['user']);
unset($_SESSION['userFullName']);

header("Location: ../../login?alert=logoutalert1");
exit();
