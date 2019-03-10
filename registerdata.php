<?php

$con = mysqli_connect('localhost', 'root', '');

if(!$con)
{
	echo 'not connected';
}


if(!mysqli_select_db($con, 'ahsan'))
{
	echo 'database not selected';
}



$FName = $_POST['FirstName'];
$LName = $_POST['LastName'];
$CNIC = $_POST['CNIC'];
$Address = $_POST['Address'];
$Email = $_POST['Email'];
$UserName = $_POST['UserName'];
$Password = md5($_POST['Password']);
$sql = "INSERT INTO register(FirstName, LastName, CNIC, Address,Email, UserName, Password)
VALUES ('$FName','$LName','$CNIC', '$Address','$Email', '$UserName','$Password')";


if(mysqli_query ($con, $sql))
{
	echo "<script language='javascript' type='text/javascript'>";
	echo "alert('Registered Successfully');";
	echo "</script>";
}


header("refresh:2; url=userlogin.php")
?>