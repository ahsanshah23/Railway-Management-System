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
                        <h2 class="pull-left">Edit/Delete Train</h2>
                       
                    </div>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '','ahsan');

                    if($conn-> connect_error)
					{
	                  echo "connection failed";
                    }

                    
                    // Attempt select query execution
					
                    $sql = "SELECT * FROM addtrain";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0)
						{
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>TrainID</th>";
                                        echo "<th>DepartureStation</th>";
                                        echo "<th>ArrivalStation</th>";
                                        echo "<th>Status</th>";
										echo "<th>DepartureTime</th>";
										echo "<th>ArrivalTime</th>";
										echo "<th>Fare</th>";
										echo "<th>Type</th>";
										echo "<th>totalseats</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['TrainID'] . "</td>";
                                        echo "<td>" . $row['DepartureStation'] . "</td>";
                                        echo "<td>" . $row['ArrivalStation'] . "</td>";
                                        echo "<td>" . $row['Status'] . "</td>";
										echo "<td>" . $row['DepartureTime'] . "</td>";
										echo "<td>" . $row['ArrivalTime'] . "</td>";
										echo "<td>" . $row['Fare'] . "</td>";
										echo "<td>" . $row['Type'] . "</td>";
										echo "<td>" . $row['totalseats'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='edit.php?TrainID=". $row['TrainID'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='delete.php?TrainID=". $row['TrainID'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
										
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