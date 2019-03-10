<html>
<head>
	 <link rel="stylesheet" href="style1.css" />
	 <link rel="stylesheet" href="style.css" />
</head>
<body background="wallpaper.jpg">
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
$BookingID = $_GET['BookingID'];
$NumberOfTickets = $_GET['NumberOfTickets'];
$TrainID=$_GET['TrainID'];

$sql = "DELETE FROM reserveticket WHERE BookingID=$BookingID";

$sql1 = "select * from graph where TrainID=$TrainID;" ;
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_row($result1);
$seats = $row1[1];	
$total = $seats-$NumberOfTickets;
$sql2 = "update graph set ReservationCount='$total' where TrainID='$TrainID'";
mysqli_query($con, $sql2);


if (mysqli_query($con, $sql)) {
    //echo "<script language='javascript' type='text/javascript'>";
	//echo "alert('Deleted Succesfully');";
	//echo "</script>";
	//header("refresh:1; url=cancellation.php?UserName=$User")
	header("refresh:1; url=email1.php?UserName=$User&BookingID=$BookingID");
} 
else {
    echo "Error deleting record: " ;
}

mysqli_close($con);

?>