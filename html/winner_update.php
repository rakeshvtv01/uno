<?php
session_start();
include '../../uno_connection.php';


$winner_id=$_GET["loginid"];



$sql22=" UPDATE games SET status='$winner_id' and game_id='$_SESSION[active_game]'"; 
$result22=mysql_query($sql22);	

header('Location:../html/winner.php');


?>