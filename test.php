 <body><form action="" method="post">
<input type="checkbox" name="hobby[]" value="coding">  coding &nbsp
<input type="checkbox" name="hobby[]" value="database">  database &nbsp
<input type="checkbox" name="hobby[]" value="software engineer">  soft Engineering <br>
<input type="submit" name="submit" value="submit">
</form></body>
<?php

if (isset($_POST['submit'])) {
	if (!empty($_POST['hobby'])) {
		
	$hobby=$_POST['hobby'];
	echo 'you have selected this ';
	foreach ($hobby as $hobby) {
		
		echo $hobby." ,";
		
	}
	
}
}
?>