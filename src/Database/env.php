<?PHP

/*
Created by Finlay Daniel Coull
2020-05-05
UHI Water Sports Centre
Initialise environment - Connect to database
*/

DEFINE ('DB_USER', '');
DEFINE ('DB_PASSWORD','');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'uhiwatersports');
@$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(mysqli_connect_errno())
{
	echo 'Cannot connect to database: ' . mysqli_connect_error();
}
