<?php

include '../../uno_connection.php';

$cards=array();
$i=0;

//$login_id=$_GET["login_id"];

$sql=mysql_query("SELECT * FROM plays_online where piled='yes' and player_id='0' ");
while($row1 =mysql_fetch_array($sql))
{
$cards[$i]=$row1['card_id'];
$i++;
}

shuffle($cards);

foreach($cards as $car)
{
echo 	"$car <br>";
}

$sql6=" UPDATE plays_online SET player_id='1',piled='no' where card_id='$cards[0]'"; 
$result6=mysql_query($sql6);	

?>