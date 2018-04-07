<?php



 session_start();
include '../../uno_connection.php';





?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table border="1">
<caption>other friends online</caption>
<tr><th>name</th><th>login id</th></tr>
<?php

$sql10=mysql_query("select * from users where id in(select login_id from online_users)");
while($row10 =mysql_fetch_array($sql10))
{
	$logids=$row10['id'];
		$nam=$row10['first_name'];
		
		echo "<tr><td>$nam</td><td></td></tr>";



}

?>
</table>

<h2></h2>
</body>
</html>