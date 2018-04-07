<?php

include '../../uno_connection.php';



$sql=mysql_query("SELECT * FROM games where game_id='$_SESSION[active_game]'");
$row =mysql_fetch_array($sql);
$status=$row['status'];

$sql1=mysql_query("SELECT * FROM users  where id='$status'");
$row1 =mysql_fetch_array($sql1);

$_SESSION["winner_fname"]=$row1['fname'];

$_SESSION["winner_email"]=$row1['email'];
$_SESSION["winner_id"]=$row1['id'];


if($status!="active")
header('Location:../html/winner.php');


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//echo "winner is $fname"
?>
</body>
</html>