1<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="style1.css" />
	 <link rel="stylesheet" href="style.css" />
</head>
<body background="train.jpg">
<table class = "gradienttable">
				<tr><blockquote> 
					<th><p>Booking ID</p></th>
					<th><p>Train ID</p></th>
					<th><p>Date Of Journey</p></th>
					<th><p>Tickets</p></th>
					<th><p>Total Price</p></th>
				</blockquote> </tr>


<?php
$conn = mysqli_connect('localhost', 'root', '','ahsan');



if($conn-> connect_error){
	echo "connection failed";
}
$User = $_GET['UserName'];
$TrainID = $_GET['TrainID'];
$BookingID=$_GET['BookingID'];
$NumberOfTickets = $_GET['NumberOfTickets'];

$sql1 = "select * from addtrain where TrainID=$TrainID;" ;
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_row($result1);
$fare = $row1[6];	
$total = $fare*$NumberOfTickets;	  
echo $total;

$sql4 = "select * from reserveticket where BookingID = (select max(BookingID) from reserveticket);" ;
$result4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_row($result4);
$far = $row4[0];	

$edit = "update reserveticket set TotalPrice='$total' WHERE BookingID = $far;";
if(mysqli_query($conn, $edit))
{
	echo "updated";		
}	
else
{
	echo "error";
}

$sql = "select * from reserveticket WHERE BookingID = (select max(BookingID) from reserveticket);";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);
if($resultcheck > 0)
{
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>  <td>".$row["BookingID"]."</td>
					<td>".$row["TrainID"]."</td>
					<td>".$row["DateOfJourney"]."</td>
					<td>".$row["NumberOfTickets"]."</td>
					<td>".$row["TotalPrice"]."</td>
					<td><a href=editreservation.php?UserName=$User&BookingID=$BookingID>edit</td>
					<td><a href=userhome.php?UserName=$User>confirm</td>
			  </tr>";
	}
	echo "</table>";
}
else
{
	echo "no rows";
}



$conn->close();

?>