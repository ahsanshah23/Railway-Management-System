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

$a=1;
$DepartureStation = $_POST['DepartureStation'];
$ArrivalStation = $_POST['ArrivalStation'];
if($DepartureStation===$ArrivalStation)
{	$a=0;}
$Status = $_POST['Status'];
$DepartureTime = $_POST['DepartureTime'];
$ArrivalTime = $_POST['ArrivalTime'];
$Fare = $_POST['Fare'];
$Type = $_POST['Type'];
$totalseats = $_POST['totalseats'];

$sql = "INSERT INTO addtrain(DepartureStation, ArrivalStation, Status, DepartureTime, ArrivalTime, Fare, Type, totalseats) 
VALUES ('$DepartureStation', '$ArrivalStation', '$Status', '$DepartureTime', '$ArrivalTime', '$Fare', '$Type', '$totalseats')";

if($a!=0)
{
if(mysqli_query ($con, $sql))
{
	header("refresh:2; url=graph1.php?totalseats=$totalseats");
}
else{
	echo "not inserted succesfullt";
}
}
else
	echo"departure and arrival station does not be same";

?>