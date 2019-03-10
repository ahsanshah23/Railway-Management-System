<html>
<head>
	 <link rel="stylesheet" href="style1.css" />
	 <link rel="stylesheet" href="style.css" />
</head>
<body background="wallpaper.jpg">
<div class="container">
        <div class="main">
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
$BookingID = $_GET['BookingID'];
$User = $_GET['UserName'];
if(isset($_POST['done']))
{
	$TrainID = $_POST['TrainID'];
	$DateOfJourney = $_POST['DateOfJourney'];
	$NumberOfTickets = $_POST['NumberOfTickets'];
	
	$edit = "UPDATE reserveticket set TrainID='$TrainID', 
	DateOfJourney='$DateOfJourney', 
	NumberOfTickets='$NumberOfTickets' where BookingID=$BookingID"; 
	
	if(mysqli_query ($con, $edit))
	{
		echo "updated";
		header("location:viewreservedruntime.php?UserName=$User");
	}
	else{
	echo mysqli_error();}

}
?>

<form method="post">
                
                
                </br>
				<label>TrainID: <input name="TrainID" type="number" required/></label>
				</br>
				</br>
                <label>Date of journey: <input name="DateOfJourney" type="date" required/></label> <br />
                </br>
				</br>
				<label>Number of Tickets: <input name="NumberOfTickets" type="number" required/></label>
				</br>
				</br>
				<input name="done" type="submit" value="submit"/> <br /><br />
				
				<p><a href=trainreportuser.php>View train details</p>
            </form>