
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> Railway Reservation System</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/header-login-signup.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

</head>

<body>

<header class="header-login-signup">

	<div class="header-limiter">

		<h1><a href="#">Railway<span> Reservation</span></a></h1>

		<nav>
			<a href="home1.html">Home</a>
			
		</nav>

		<ul>
			<li><a href="register2.html">Sign up</a></li>
		</ul>

	</div>

</header>


<?php
$con = mysqli_connect('localhost', 'root', '','ahsan');

if ($_SERVER['REQUEST_METHOD']=='POST'){
$UserName = $_POST['UserName'];
$Password = md5($_POST['password']);
$sql= "SELECT * FROM register WHERE UserName = '$UserName' AND Password = '$Password' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
echo "<script >alert('success')</script>";
header("location:userhome.php?UserName=$UserName");

}else{
echo "<script language='javascript' type='text/javascript'>";
	echo "alert('UserName or password not correct,please enter again');";
	echo "</script>";
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>User Login</h2>
                    </div>
                    <p>Please fill this form and submit to log in.</p>
                    <form method="post">
                        <div class="form-group">
                            <label>User Name: <input name="UserName" type="text" required/></label>
                            <span class="help-block"></span>
                        </div>
						<div class="form-group">
                            <label>Password: <input name="password" type="password" required/></label> <br />
                            <span class="help-block"></span>
                        </div>
                       
                        <input type="submit" class="btn btn-primary" value="Submit" name="done">
                 
                    </form>
					
                </div>
            </div>        
        </div>
    </div>
</body>
</html>