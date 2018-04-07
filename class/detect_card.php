<?php session_start();
include '../../uno_connection.php';


?>

<?php

class Findcard
{
	
function find($cardid)
{


	  $sql13=mysql_query("SELECT * FROM `plays_online`where piled='yes' ORDER BY dates and times DESC");
$row13 =mysql_fetch_array($sql13);
$cardid3=$row13['card_id'];


		$sql14=mysql_query("SELECT * FROM uno_cards WHERE card_id ='$cardid3'");
$row14 =mysql_fetch_array($sql14);
echo "count";

	$color3=$row14['card_color'];
		$cont3=$row14['content'];
		
	
	
	$sql14=mysql_query("SELECT * FROM uno_cards WHERE card_id ='$cardid'");
$row14 =mysql_fetch_array($sql14);
echo "count";

	$color31=$row14['card_color'];
		$cont31=$row14['content'];
		
		
		
		if($color3==$color31 || $cont3==$cont31)
		return "yes";
		else
		return "no";
	
	
	
}
	
}

?>