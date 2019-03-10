
<?php
$con = mysqli_connect('localhost', 'root', '');

if(!$con)
{
	echo 'not connected';
}

$a=1;
if(!mysqli_select_db($con, 'ahsan'))
{
	echo 'database not selected';
}
$ID = $_GET['TrainID'];
if(isset($_POST['done']))
{
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
	
	$edit = "UPDATE addtrain set DepartureStation='$DepartureStation', 
	ArrivalStation='$ArrivalStation', 
	Status='$Status', 
	DepartureTime='$DepartureTime', 
	ArrivalTime='$ArrivalTime', 
	Fare='$Fare', 
	Type='$Type', 
	totalseats='$totalseats' where TrainID=$ID"; 
	
	if($a!=0)
{
if(mysqli_query ($con, $edit))
{
	echo "<script language='javascript' type='text/javascript'>";
	echo "alert('Train succesfully updated');";
	header("location:trainreportuser.php");
	echo "</script>";
}
}

else
{echo"departure and arrival station does not be same";
echo mysqli_error();}


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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Edit Train</h2>
                    </div>
                    <p>Please fill this form and submit to Edit Train.</p>
                    <form method="post">
                        <div class="form-group">
                            <label>
                    Departure Station:
                    <select name="DepartureStation" required>
                        <option value="Karachi">Karachi</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Peshawar">Peshawar</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Multan">Multan</option>
                    </select>
                </label>
                            <span class="help-block"></span>
                        </div>
						<div class="form-group">
                             <label>
                    Arrival Station:
                    <select name="ArrivalStation" required>
                        <option value="Karachi">Karachi</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Peshawar">Peshawar</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Multan">Multan</option>
                    </select></label>
                            <span class="help-block"></span>
                        </div>
						<div class="form-group ">
                            <label>
                    Status:
                    <select name="Status" required>
                        <option value="Functional">Funcational</option>
                        <option value="Notfunctional">Not Functional</option>
                    </select>
                </label>
                            <span class="help-block"></span>
                        </div>
						<div class="form-group ">
                            <label>Arrival Time: <input name="ArrivalTime" type="time" required/></label> <br />
                            <span class="help-block"></span>
                        </div>
						<div class="form-group">
                            <label>Departure Time: <input name="DepartureTime" type="time" required/></label> <br />
                            <span class="help-block"></span>
                        </div>
						<div class="form-group ">
                             <label>Fare: <input name="Fare" type="number" required/></label> <br />
                            <span class="help-block"></span>
                        </div>
						<div class="form-group ">
                            <label>            
                    Type:
                    <select name="Type" required>
                        <option value="Economy">Economy</option>
                        <option value="Business">Business</option>
                        <option value="GreenTrain">Green Train</option>
                        <option value="FirstClaas">First Claas</option>
                    </select>
                </label>
                            <span class="help-block"></span>
                        </div>
						<div class="form-group ">
                            <label>Total seats: <input name="totalseats" type="number" required/></label> <br />
                            <span class="help-block"></span>
                        </div>
						
                        <input type="submit" class="btn btn-primary" value="Submit" name ="done">
                        <a href="adminhome.html" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>