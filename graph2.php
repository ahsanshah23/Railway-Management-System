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
$TrainID = $_GET['TrainID'];
$UserName = $_GET['UserName'];
$NumberOfTickets = $_GET['NumberOfTickets'];
$DateOfJourney = $_GET['DateOfJourney'];
$TotalPrice = $_GET['TotalPrice'];
$BookingID = $_GET['BookingID'];

$sql2 = "select RemainingSeats from Inventory where TrainID = '$TrainID' AND DateOfJourney = '$DateOfJourney'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_row($result2);
$rem_seats = $row2[0];

if($NumberOfTickets <= $rem_seats)
{
	$sql1 = "select * from graph where TrainID=$TrainID;" ;
	$result1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$reserved = $row1[1];	
	$total = $NumberOfTickets+$reserved;

	$sql = "update graph set ReservationCount='$total' where TrainID=$TrainID";
	mysqli_query($con, $sql);
	
	$rem_seats = $rem_seats - $NumberOfTickets;
	$sql3 = "UPDATE inventory SET RemainingSeats='$rem_seats' where  TrainID ='$TrainID' and DateOfJourney ='$DateOfJourney' ";
	if (mysqli_query($con, $sql3))
	{
		$sql4 = "Update reserveticket set UserName='$UserName', TrainID='$TrainID', DateOfJourney='$DateOfJourney',
		NumberOfTickets='$NumberOfTickets', TotalPrice='$TotalPrice' where BookingID=$BookingID";
		
 
		if(mysqli_query($con, $sql4))
		{
				
			header("refresh:2; url=email.php?UserName=$UserName&BookingID=$BookingID&TrainID=$TrainID&NumberOfTickets=$NumberOfTickets&DateOfJourney=$DateOfJourney&TotalPrice=$TotalPrice");
		}
		else{
			echo "no";
		}
		
	}
	else{
			echo "no1";
		}
}
else
{
	echo "<script language='javascript' type='text/javascript'>";
	echo "alert('Seats reserved are greater than available seats');";
	echo "</script>";
	header("refresh:2; url=reserveticket.php?UserName=$UserName");
	
}
?>