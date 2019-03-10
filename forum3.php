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
$UserName = $_GET['UserName'];
$sql4 = "select Email from register where UserName = '$UserName';" ;
$result4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_row($result4);
$Email = $row4[0];

if (isset($_POST['done']))
{
	$input = $_POST['input'];
	$dataString = $Email;
	$dataString.= ":";
	$dataString.= " ";
	$dataString.= " ";
	$dataString .= $input;

$dataString .= "\n";

$fWrite = fopen("forum.txt","at");

$wrote = fwrite($fWrite, $dataString);

fclose($fWrite);


echo "<script language='javascript' type='text/javascript'>";
echo "alert('Your message has been sent to the administrator');";
echo "</script>";
header("refresh:2; url=userhome.php?UserName=$UserName");

	
	
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>User Forum</title>
  <link href='https://fonts.googleapis.com/css?family=Lora|Ubuntu:300,400' rel='stylesheet' type='text/css'>
  
  
      <link rel="stylesheet" href="forum12.css">

  
</head>

<body>
  <h1>User Forum</h1>
<form method="post">
  <textarea name="input" rows="2" class="question" id="msg" required autocomplete="off"></textarea>
  <label for="msg"><span>What's your message?</span></label>
  <input type="submit" value="Submit!" name="done"/>
</form>
  
  
</body>
</html>
