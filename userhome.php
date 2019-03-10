

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

$User = $_GET['UserName'];
if(isset($_POST['done']))
{
	$TrainID = $_POST['TrainID'];
	$DateOfJourney = $_POST['DateOfJourney'];
	$NumberOfTickets = $_POST['NumberOfTickets'];
	
	$sql1= "SELECT * FROM addtrain WHERE TrainID = '$TrainID'";
	$result = mysqli_query($con,$sql1);
	$check = mysqli_fetch_array($result);
	$currentdate= date("Y-m-d");
	$maxdate = date('Y-m-d', strtotime($currentdate. ' + 10 days'));
	if($currentdate<$DateOfJourney && $DateOfJourney<$maxdate)
	{
		if(isset($check))
		{
			$sql = "INSERT INTO reserveticket( UserName, TrainID, DateOfJourney, NumberOfTickets, TotalPrice,BookingStatus)
			VALUES ('$User', '$TrainID', '$DateOfJourney','$NumberOfTickets', '2', 'Active')";
			if(mysqli_query ($con, $sql))
			{
				echo "reserved";	
				header("refresh:1; url=viewreservedruntime.php?UserName=$User&TrainID=$TrainID&NumberOfTickets=$NumberOfTickets&DateOfJourney=$DateOfJourney");
			}
		}
		else
		{
			echo 'TrainID does not exist';
		}
	}
	else
	{
		echo "Enter date within 10 days from current date";
		
	}
	
}		
	
?>


<html >
<head>
  <meta charset="UTF-8">
  <title>HomePage</title>
  
  
  
      <link rel="stylesheet" href="13.css">

  
</head>

<body>
  

 <a href="reserveticket.php?UserName=<?php echo "$User" ?>" class="rainbow-button" alt="ReserveTicket"></a>
 
 <a href="trainreportuser.php?UserName=<?php echo "$User" ?>" class="rainbow-button" alt="TrainReport"></a>
 
 <a href="viewhistory.php?UserName=<?php echo "$User" ?>" class="rainbow-button" alt="View Bookings"></a>
 
 <a href="cancellation.php?UserName=<?php echo "$User" ?>" class="rainbow-button" alt="Cancel Booking"></a>
 
 <a href="forum3.php?UserName=<?php echo "$User" ?>" class="rainbow-button" alt="User Forum"></a>
 
 <a href="logout.php" class="rainbow-button" alt="LogOut"></a>

  
  
</body>
</html>

