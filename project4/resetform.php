<?php

if(isset($_POST["resetbtn"]))
{


$connect = mysqli_connect("localhost", "root", "", "project4");

$un = $_POST["username"];
$mob = $_POST["mobile"];

 $qry = "SELECT * FROM user WHERE username = '$un' AND mobile = '$mob'";

$result =  mysqli_query($connect, $qry);
$data = mysqli_fetch_assoc($result);
$id = $data["id"];

$row = mysqli_num_rows($result);


if($row>0)
{
 $pwd = randomPassword();
 $qry = "UPDATE user SET password= '$pwd' WHERE id = '$id'";
 $result =  mysqli_query($connect, $qry);
 echo "Pasword Reset Successfully";
}
else
{
	echo "Invalid Username or Mobile Number";
}

}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#$@';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<form method="post">

<table cellspacing="40">
	<tr> 
		<td> Username </td>
		<td> <input type="text" name="username"> </td>
	</tr>
	<tr> 
		<td> Mobile </td>
		<td> <input type="tel" name="mobile"> </td>
	</tr>
	<tr> 
		<td colsopan="2" align="centre"> <button name="resetbtn"> Reset Password </button> </td>
		
	</tr>
	<tr>
		<td colspan="2"> Password - <font color="blue"> <?php echo $pwd ?> </font>, kindly copy  password, Password changed</td>
	</tr>
</table>
</form>

</body>
</html>