<?php

include 'database.php';

class StoreToDatabase{
	
	
function sendData($file_name,$lang,$artist,$album,$singers,$year,$genre,$add,$image)
{
	
	
	if($year<2000)
	$type="retro";
	else
	$type="new";
	

$sql20=" INSERT INTO songs(song_id, song_name, song_type, languages, album, genre,singer_name,address,rating,dates,times,artist,year,image) VALUES  ('','$file_name','$type','$lang','$album','$genre','$singers','$add','','','','$artist','$year','$image')"; 
$result20=mysql_query($sql20);	


}


function signUp($fname,$lname,$email,$pass,$mobile)
{
	
	
	

$sql20=" INSERT INTO users(id, fname, lname, uname, email, pass, mobile, lang1,lang2,lang3) VALUES  ('','$fname','$lname','','$email','$pass','$mobile','','','')"; 
$result20=mysql_query($sql20);	


}	

function dashRelease($par1,$par2,$par3,$par4)
{
	
	
	

$sql20=" UPDATE dashboard SET new_release1='$par1' ,new_release2='$par2',new_release3='$par3',new_release4='$par4'   "; 
$result20=mysql_query($sql20);	


}

function dashMusic($par1,$par2,$par3,$par4)
{
	
	
	

$sql20=" UPDATE dashboard SET music1='$par1' ,music2='$par2',music3='$par3',music4='$par4'   "; 
$result20=mysql_query($sql20);	


}


function playHistory($songid,$logid)
{
	
	
	$sql=mysql_query("SELECT * FROM songs  where song_id='$songid'");
$row =mysql_fetch_array($sql);
$album=$row['album'];
$language=$row['languages'];
$artist=$row['artist'];
$address=$row['address'];
$image=$row['image'];
$song_names=$row['song_name'];


$sql20=" INSERT INTO history(id,login_id,song_id,album,artist,language,address,image,dates,times,count,song_name) VALUES  ('','$logid','$songid','$album','$artist','$language','$address','$image','','','','$song_names')"; 
$result20=mysql_query($sql20);	

}
	
}



?>