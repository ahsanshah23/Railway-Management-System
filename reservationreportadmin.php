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
                        <h2 class="pull-left">Ticket Reservation Report</h2>
                        
                    </div>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '','ahsan');

                    if($conn-> connect_error)
					{
	                  echo "connection failed";
                    }

                    
                    // Attempt select query execution
					
                    $sql = "SELECT * FROM reserveticket";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0)
						{
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>UserName</th>";
                                        echo "<th>TrainID</th>";
                                        echo "<th>DateOfJourney</th>";
                                        echo "<th>NumberOfTickets</th>";
										
										
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['UserName'] . "</td>";
                                        echo "<td>" . $row['TrainID'] . "</td>";
                                        echo "<td>" . $row['DateOfJourney'] . "</td>";
                                        echo "<td>" . $row['NumberOfTickets'] . "</td>";
										echo "<td>" . $row['UserName'] . "</td>";
										
										
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 0
                    // Close connection
                    //$conn->close();
                    ?>
					<input type="button" class="btn btn-primary" value="Go back" onclick="window.location.href='adminhome.html'">
                </div>
            </div>        
        </div>
    </div>
</body>
</html>