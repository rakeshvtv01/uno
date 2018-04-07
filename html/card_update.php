<?php
//card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=draw2&order=nil

include '../../uno_connection.php';
include '../class/detect_card.php';


$m=date("Y-m-d");
$t= date('h:i:sa');

//card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=wc4&order="+n

$card_id=$_GET["cardid"];
$whose_turn=$_GET["whose_turn"];

$card_type=$_GET["type"];
$next_order=$_GET["order"];

echo "card id $card_id whose turn $whose_turn type $card_type next order $next_order";



$sql6=" UPDATE plays_online SET player_id='0',piled='yes',times='$t',dates='$m' where card_id='$card_id'"; 
$result6=mysql_query($sql6);	



$sql1=mysql_query("SELECT * FROM players_online where game_id='$_SESSION[active_game]'");
$row1=mysql_fetch_array($sql1);
$numof_rows = mysql_num_rows($sql1);


if($card_type=="draw2")
{
echo "inside draw2";	

         if($whose_turn==$numof_rows){
              $next_turn=1;
              $whose_turn=2;
                                     }
        else{
	       $next_turn=$whose_turn+1;	
            $whose_turn=$whose_turn+2;
			 if($whose_turn>$numof_rows){
			  $n1=$whose_turn-$numof_rows;
			  $whose_turn=$n1;	 
			 }
            }

echo "<br> $whose_turn $next_turn";
$sql10=mysql_query("SELECT * FROM players_online where game_id='$_SESSION[active_game]' and dice='$next_turn'");
$row10=mysql_fetch_array($sql10);
$next_turn_id=$row10['player_id'];


echo "$next_turn_id";

$inc=0;
$card_array=array();
$sql112=mysql_query("SELECT * FROM plays_online where game_number='$_SESSION[active_game]' and piled='yes'");
            while($row112=mysql_fetch_array($sql112)){
	
                     $card_array[$inc]=$row112['card_id'];
	                 $inc++;
                                                    } 
shuffle($card_array);
	

                      for($j=1;$j<=2;$j++){
						  echo "$card_array[$j]<br>";
	                	$temp_card=$card_array[$j];
		                $sql6=" UPDATE plays_online SET player_id='$next_turn_id',piled='',times='$t',dates='$m' where                        card_id='$temp_card' and game_number='$_SESSION[active_game]'"; 
                        $result6=mysql_query($sql6);

	                                  }
									  echo "$whose_turn<br>";
	
$sql7=" UPDATE `games` SET whose_turn='$whose_turn',next_order='nil' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);	
	
}
//for wild card 4 card
else if($card_type=="wc4")
{
echo "insode wc4";
         if($whose_turn==$numof_rows){
              $next_turn=1;
              $whose_turn=2;
                                     }
        else{
	
            $next_turn=$whose_turn+1;	
            $whose_turn=$whose_turn+2;
			 if($whose_turn>$numof_rows){
			  $n1=$whose_turn-$numof_rows;
			  $whose_turn=$n1;	 
			 }
			 
            }


$sql10=mysql_query("SELECT * FROM players_online where game_id='$_SESSION[active_game]' and dice='$next_turn'");
$row10=mysql_fetch_array($sql10);
$next_turn_id=$row10['player_id'];




$inc=0;
$card_array=array();
$sql112=mysql_query("SELECT * FROM plays_online where game_number='$_SESSION[active_game]' and piled='yes'");
            while($row112=mysql_fetch_array($sql112)){
	
                     $card_array[$inc]=$row112['card_id'];
	                 $inc++;
                                                    } 
shuffle($card_array);
	

                      for($j=1;$j<=4;$j++){
	                	$temp_card=$card_array[$j];
		                $sql6=" UPDATE plays_online SET player_id='$next_turn_id',piled='',times='$t',dates='$m' where                        card_id='$temp_card' and game_number='$_SESSION[active_game]'"; 
                        $result6=mysql_query($sql6);

	                                  }
	
$sql7=" UPDATE `games` SET whose_turn='$whose_turn',next_order='$next_order' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);	
		
	
	
	
}//end of wild card 4

else if($card_type=="wc")
{
//card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=wc&order="+n	



         if($whose_turn==$numof_rows){
             
              $whose_turn=1;
                                     }
        else{
	
         
            $whose_turn=$whose_turn+1;
            }

                     
	
$sql7=" UPDATE `games` SET whose_turn='$whose_turn',next_order='$next_order' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);	
		
	
}// end of wild card
else if($card_type=="skip")
{
	//card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=skip&order=nil
	
         if($whose_turn==$numof_rows){
             
              $whose_turn=2;
			  $sql7=" UPDATE `games` SET whose_turn='$whose_turn',next_order='nil' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);	


                                     }
        else{
	
         
            $whose_turn=$whose_turn+2;
			
			if($whose_turn>$numof_rows)
			{
				$new_whose_turn=$whose_turn-$numof_rows;
				$sql7=" UPDATE `games` SET whose_turn='$new_whose_turn',next_order='nil' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);	
			}
			else
			{
				
				$new_whose_turn=$whose_turn-$numof_rows;
				$sql7=" UPDATE `games` SET whose_turn='$whose_turn',next_order='nil' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);
			}
            }

                     
	

	
}//end of skip
else if($card_type=="rev")
{
//card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=rev&order=nil


	$sql20=mysql_query("SELECT * FROM players_online where game_id='$_SESSION[active_game]'");
while($row20=mysql_fetch_array($sql20)){

$rev_player_online=$row20['player_id'];	
$i=$row20['dice'];
$n=$numof_rows;

$rev_order=($n-$i)+1;	


$sql7=" UPDATE players_online SET dice='$rev_order' where game_id='$_SESSION[active_game]' and player_id='$rev_player_online'"; 
$result7=mysql_query($sql7);	

	echo "dice value=$i num of_rows==$n reverse order=$rev_order playerid=$rev_player_online<br>";
}


$sql201=mysql_query("SELECT * FROM players_online where game_id='$_SESSION[active_game]' and player_id='$_SESSION[login_id]'");
$row201=mysql_fetch_array($sql201);

$whose_turn12=$row201['dice'];	

	if($whose_turn12==$numof_rows){
          
              $whose_turn12=1;
                                     }
        else{
	
           
            $whose_turn12=$whose_turn12+1;
            }

$sql71=" UPDATE `games` SET whose_turn='$whose_turn12',next_order='nil' where game_id='$_SESSION[active_game]'"; 
$result71=mysql_query($sql71);	
	
}

else
{
	//card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=no&order=nil
          if($whose_turn==$numof_rows){
              $whose_turn=1;
                               }



                          else{
                          $whose_turn=$whose_turn+1;
                              }

$sql7=" UPDATE `games` SET whose_turn='$whose_turn',next_order='nil' where game_id='$_SESSION[active_game]'"; 
$result7=mysql_query($sql7);		
	
}



header('Location:../html/play_dashboard.php');
?>