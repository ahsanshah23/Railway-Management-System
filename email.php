<?php
require 'PHPMailer/PHPMailerAutoload.php';

$con = mysqli_connect('localhost', 'root', '');

if(!$con)
{
	echo 'not connected';
}


if(!mysqli_select_db($con, 'ahsan'))
{
	echo 'database not selected';
}


$TrainID = $_GET['TrainID'];
$UserName = $_GET['UserName'];
$NumberOfTickets = $_GET['NumberOfTickets'];
$DateOfJourney = $_GET['DateOfJourney'];
$TotalPrice = $_GET['TotalPrice'];
$BookingID = $_GET['BookingID'];

$mail = new PHPMailer;



$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ahsanshah2398@gmail.com';                 // SMTP username
$mail->Password = 'a0214990621 ';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$sql4 = "select Email from register where UserName = '$UserName';" ;
$result4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_row($result4);
$Email = $row4[0];

$sql5 = "select FirstName from register where UserName = '$UserName';" ;
$result5 = mysqli_query($con,$sql5);
$row5 = mysqli_fetch_row($result5);
$Name = $row5[0];

$message = "Your Booking has been confirmed";
$message.= "\n";
$message.= "Booking ID:";
$message.= $BookingID;
$message.= "\n";
$message .= "TrainID:";
$message.= $TrainID;
$message.= "\n";
$message .= "NumberOfTickets:";
$message.= $NumberOfTickets;
$message.= "\n";
$message .= "TotalPrice:";
$message.= $TotalPrice;
$message.= "\n";


$mail->setFrom('ahsanshah2398@gmail.com', 'Ahsan');
$mail->addAddress($Email, $Name);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Booking confirmation email';
$mail->Body    = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
				echo "<script language='javascript' type='text/javascript'>";
				echo "alert('Booking Confirmed');";
				echo "</script>";
				header("refresh:2; url=userhome.php?UserName=$UserName");
}

?>