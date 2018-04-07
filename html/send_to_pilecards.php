<?php
session_start();
include '../../uno_connection.php';

$cards_from_database= array();
$log_id=$_GET["loginid"];
$whose_turn=$_GET["whose_turn"];

$i=0;

echo "=login==$log_id=whose=$whose_turn";

$sql13=mysql_query("select * from plays_online where piled='yes' and player_id=0 order by dates ASC, times ASC");
while($row13 =mysql_fetch_array($sql13))
{
	
$cards_from_database[$i]=$row13['card_id'];	
$i++;
}


shuffle($cards_from_database);
$cont=count($cards_from_database);

$final_count=rand(0,$cont-1);

$final_card=$cards_from_database[$final_count];

echo "$final_card";


$sql22=" UPDATE plays_online SET player_id='$log_id' WHERE card_id='$final_card'"; 
$result22=mysql_query($sql22);	




$sql1=mysql_query("SELECT * FROM players_online where game_id='$_SESSION[active_game]'");
$row1=mysql_fetch_array($sql1);
$numof_rows = mysql_num_rows($sql1);


if($whose_turn==$numof_rows)
$whose_turn=1;
else
$whose_turn=$whose_turn+1;

$sql7=" UPDATE `games` SET whose_turn='$whose_turn' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);


header('Location:../html/play_dashboard.php');
?>