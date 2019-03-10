<html>
<head> <style>

body {
  
  background-color:#191919;
  min-height:100vh;
  color: white;
	font-size: 20px;
	font-family:Helvetica,Sans-serif;
  
h2: {
  text-decoration:none;
  color:#FFF;
}

}
</style></head>
<body ">
	<h2> ADMIN FORUM </h2>
</body>
</html>
<?php
  
$file_handle = fopen("forum.txt", "rb");

while (!feof($file_handle) ) {

$line_of_text = fgets($file_handle);
$parts = explode('=', $line_of_text);

print $parts[0] . " ". "<BR>";

}

fclose($file_handle);
?>
<input type="button" class="btn btn-primary" value="Go back" onclick="window.location.href='adminhome.html'">
</html>
