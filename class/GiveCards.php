

<?php


	/*
public $cardid=array();
public $cardcolor=array();
public $i=0;
public $user_count=1;
public $terminate_count=1;
public $rounds=1;

*/
function sendCards($players_ids,$gamesid)
{

$count_users=count($players_ids);

$j=0;
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


shuffle($cardid);

foreach ($cardid as $cards) {
	$temp=$rounds;
	$temp--;
	$user_ids=$players_ids[$temp];
		echo "user_counts $user_count rounds $rounds count users $count_users <br>";
	
	if($user_count > 0 && $user_count <8 && $rounds <=$count_users){
$sql20=" INSERT INTO plays_online(`game_id`, `groupid`, `card_id`, `player_id`, `times`, `dates`,`piled`,`game_number`) VALUES  ('','','$cards','$user_ids','','','','$gamesid')"; 
$result20=mysql_query($sql20);	

$user_count=$user_count+1;



	}

	if($terminate_count>=63 && $rounds >7){
		exit(0);
	
	}
	
	if($user_count==8 ){
	$rounds=$rounds+1;	
	$user_count=1;
	}	
}
	echo "$terminate_count==$rounds";
}// end of function send cards


function insert_leftcards($game_id)
{
$m=date("Y-m-d");
$t= date('h:i:sa');
	
$sql10=mysql_query("SELECT * FROM `uno_cards` WHERE card_id not in(select card_id from plays_online where game_number='$game_id')");
while($row10 =mysql_fetch_array($sql10))
{
$cardids=$row10['card_id'];

$cardcolors=$row10['card_color'];

$sql22=" INSERT INTO plays_online(`game_id`, `groupid`, `card_id`, `player_id`, `times`, `dates`,`piled`,`game_number`) VALUES  ('','','$cardids','0','$t','$m','yes','$game_id')"; 
$result22=mysql_query($sql22);	



}	
	
	
}
	
	
// end of class



?>