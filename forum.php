   <?php
// check that form was submitted
//   (you'll need to change these indices to match your form field names)
if(isset($_POST['done']))
{
	$text =  $_POST['comment'] ;

    // save the record to your .txt file (I still recommend JSON)
    
    $file = 'yourfile.txt';
    file_put_contents( $text,$file );
}

?>


<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title></title>
</head>

            <h2>GENERAL DISCUSSION FORUM</h2>
			<form method ="post">
            <textarea id="forum" cols="110" rows="15" name = "comment"/></textarea>
            <input id="Submit1" type="submit" value="submit" name="done"/><br />
            <input class="MyButton" onclick="window.location.href = 'adminhome.html'" type="button" value="Go back" />
			</form>
    
	