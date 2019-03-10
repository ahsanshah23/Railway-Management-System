<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">History User</h2>
                       
                    </div>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '','ahsan');

                    if($conn-> connect_error)
					{
	                  echo "connection failed";
                    }
					$User = $_GET['UserName'];
					$TrainID = $_GET['TrainID'];
					$NumberOfTickets = $_GET['NumberOfTickets'];
					$DateOfJourney=$_GET['DateOfJourney'];

					$sql1 = "select * from addtrain where TrainID=$TrainID;" ;
					$result1 = mysqli_query($conn,$sql1);
					$row1 = mysqli_fetch_row($result1);
					$fare = $row1[6];	
					$total = $fare*$NumberOfTickets;	  
					

					$sql4 = "select * from reserveticket where BookingID = (select max(BookingID) from reserveticket);" ;
					$result4 = mysqli_query($conn,$sql4);
					$row4 = mysqli_fetch_row($result4);
					$far = $row4[0];	
					
					$sql5 = "select max(BookingID) from reserveticket";
					$result5 = mysqli_query($conn,$sql5);
					$row5 = mysqli_fetch_row($result5);
					$MaxID = $row5[0];
		
					
                    
                    
                       
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>BookingID</th>";
                                        echo "<th>TrainID</th>";
                                        echo "<th>DateOfJourney</th>";
                                        echo "<th>NumberOfTickets</th>";
										echo "<th>TotalPrice</th>";
										
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                               
                                    echo "<tr>";
                                        echo "<td>$MaxID</td>";
                                        echo "<td>$TrainID</td>";
                                        echo "<td>$DateOfJourney</td>";
                                        echo "<td>$NumberOfTickets</td>";
										echo "<td>$total</td>";
										echo "<td>";
                                        echo "<a href='editreservation.php?UserName=$User&BookingID=$MaxID' title='Update Record'></span>edit </a>";
										echo "<td>";
										echo "<a href='graph2.php?UserName=$User&BookingID=$MaxID&TrainID=$TrainID&NumberOfTickets=$NumberOfTickets&DateOfJourney=$DateOfJourney&TotalPrice=$total' title='Confirm'></span>confirm</a>";
                                        
                                        echo "</td>";
										echo "</tr>";
									
												
                                    echo "</tr>";
                                
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            
                        
                    
 0
                    // Close connection
                    //$conn->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>