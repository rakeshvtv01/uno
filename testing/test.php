<?php
include '/../../uno_connection.php';


?>

<?php

function testing($arr1,$gameid){

$m=date("Y-m-d");
$t= date('h:i:sa');


 $cardid=array();
$cardcolor=array();


$i=0;
$user_count=1;
$terminate_count=1;
$rounds=1;
$sql=mysql_query("SELECT * FROM uno_cards");
while($row1 =mysql_fetch_array($sql))
{
$cardid[$i]=$row1['card_id'];

$cardcolor[$i]=$row1['card_color'];

$i=$i+1;

}

$counted=count($arr1);
shuffle($cardid);

$temp=$rounds-1;
foreach ($cardid as $cards) {


	//$user_ids=$players_ids[$temp];
		//echo "user_counts $user_count rounds $rounds count users $count_users <br>";
	
	if($user_count > 0 && $user_count <8 && $rounds <=$counted){
$sql20=" INSERT INTO plays_online(`game_id`, `groupid`, `card_id`, `player_id`, `times`, `dates`,`piled`,`game_number`) VALUES  ('','','$cards','$arr1[$temp]','$t','$m','','$gameid')"; 
$result20=mysql_query($sql20);	

$user_count=$user_count+1;



	}

	if($terminate_count>=63 && $rounds >7){
		exit(0);
	
	}
	
	if($user_count==8 ){
		
	$rounds=$rounds+1;	
	$user_count=1;
	$temp++;
	
	}	

}

}

?>