<?php
        //address of the server where db is installed
        $servername = "localhost";
        //username to connect to the db
        //the default value is root
        $username = "root";
        //password to connect to the db
        //this is the value you specified during installation of WAMP stack
        $password = "";
        //name of the db under which the table is created
        $dbName = "ahsan";
        //establishing the connection to the db.
        $conn = new mysqli($servername, $username, $password, $dbName);
        //checking if there were any error during the last connection attempt
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
		$query = "SELECT * FROM graph";
        //storing the result of the executed query
        $result = $conn->query($query);
		
		$jsonArray = array();
        //check if there is any data returned by the SQL Query
        if ($result->num_rows > 0) {
          //Converting the results into an associative array
          while($row = $result->fetch_assoc()) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = $row['TrainID'];
            $jsonArrayItem['value'] = $row['ReservationCount'];
            //append the above created object into the main array.
            array_push($jsonArray, $jsonArrayItem);
          }
        }
		
		  $conn->close();
        //set the response content type as JSON
        header('Content-type: application/json');
        //output the return value of json encode using the echo function. 
        echo json_encode($jsonArray);


?>    