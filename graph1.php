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
$sql = "select max(TrainID) from addtrain";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($result);
$ID = $row[0];

$Tickets = $_GET['totalseats'];

$sql1= "INSERT into graph(TrainID) VALUES('$ID')";
mysqli_query($con,$sql1);

$count=0;
$currentdate = date("Y-m-d");

while($count<10)
{
	$currentdate = date('Y-m-d', strtotime($currentdate. ' + 1 days'));
	$sql3 = "insert into inventory(TrainID, DateOfJourney, TotalSeats, RemainingSeats) values ('$ID', '$currentdate', '$Tickets','$Tickets')";
	if(mysqli_query($con,$sql3))
	{
		$count = $count +1;
	}
	else
	{
		echo "no";
	}	
}
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Train succesfully added');";
echo "</script>";
header("refresh:2; url=adminhome.html");
?>