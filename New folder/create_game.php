<?php
 session_start();
include '../../uno_connection.php';



class create_game{
	
function create($user_id,$game_id,$password)
{
	$sql20=" INSERT INTO games(game_id, dates, times, passwords, created_by, status,whose_turn,next_order) VALUES  ('$game_id','','','$password','$user_id','active','1','nil')"; 
$result20=mysql_query($sql20);

$sql20=" INSERT INTO players_online(id,game_id,player_id,dates,times,status,dice) VALUES  ('','$game_id','$user_id','','','active','1')"; 
$result20=mysql_query($sql20);

return 1;
	
}
	
}



?>