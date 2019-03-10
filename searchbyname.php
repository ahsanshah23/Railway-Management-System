<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="style1.css" />
	 <link rel="stylesheet" href="style.css" />
</head>
<h1> TRAIN REPORT </h1>
<body background="wallpaper.jpg">
<table class = "gradienttable">
				<tr><blockquote> 
					<th><p>Name</p></th>
					<th><p>CNIC</p></th>
					<th><p>Address</p></th>
					<th><p>Username</p></th>
					
				</blockquote> </tr>


<?php
$conn = mysqli_connect('localhost', 'root', '','ahsan');

if($conn-> connect_error){
	echo "connection failed";
}
if(isset($_POST['done']))
{
	$Name = $_POST['Name'];
}

$sql = "select * from register where Name='$Name';";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);
if($resultcheck > 0)
{
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>  <td>".$row["Name"]."</td>
					<td>".$row["CNIC"]."</td>
					<td>".$row["Address"]."</td>
					<td>".$row["UserName"]."</td>
					 
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
<form method="post">
	<label>Name: <input name="Name" type="text" required/></label>
	<input name="done" type="submit" value="submit" /> <br /><br />