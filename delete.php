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

$ID = $_GET['TrainID'];
$sql = "DELETE FROM addtrain WHERE TrainID=$ID";
$sql1 = "DELETE FROM graph WHERE TrainID=$ID";
mysqli_query($con,$sql1);

if (mysqli_query($con, $sql)) {
    echo "<script language='javascript' type='text/javascript'>";
	echo "alert('Deleted Succesfully');";
	echo "</script>";
} 
else 
{
    echo "Error deleting record: " ;
}


header("refresh:1; url=trainreportadmin.php")
?>