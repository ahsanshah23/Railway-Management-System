<html>
<head>
	
</head>
<body >
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
			$sql4 = "INSERT INTO reserveticket( UserName, TrainID, DateOfJourney, NumberOfTickets, TotalPrice)
			VALUES ('a', '0', '0000-00-00','0', '0')";
			mysqli_query($con, $sql4);
			
			
			header("refresh:1; url=viewreservedruntime.php?UserName=$User&TrainID=$TrainID&NumberOfTickets=$NumberOfTickets&DateOfJourney=$DateOfJourney");
				
			
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <di
		0v class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to reserve ticket.</p>
                    <form method="post">
                        <div class="form-group">
                            <label>TrainID: <input name="TrainID" type="number" required/></label>
                            <span class="help-block"></span>
                        </div>
						<div class="form-group">
                            <label>Date of journey: <input name="DateOfJourney" type="date" min="<?php echo "date('Y/m/d')"?>" max="2019-01-1" required/></label> <br />
                            <span class="help-block"></span>
                        </div>
						<div class="form-group">
                            <label>Number of Tickets: <input name="NumberOfTickets" type="number" min='1' required/></label>
                            <span class="help-block"></span>
                       
                        <input type="submit" class="btn btn-primary" value="Submit" name="done">
                        <a href="userhome.php?UserName=<?php echo $User ?>" class="btn btn-default">Cancel</a>
						<p><a href=trainreportuser.php>View train details</p>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
