<?php session_start();
include '../../uno_connection.php';
include '../testing/test.php';


include_once '../class/GiveCards.php';
include_once '../class/online_users.php';


include_once '../testing/testing.php';

$flag=0;
$flag1=0;


if(isset($_SESSION["active_game"])){
$sql13=mysql_query("select u.id,u.first_name ,p.player_id from players_online p,users u where u.id=p.player_id and p.game_id=$_SESSION[active_game]");
$count12=mysql_num_rows ($sql13);
}

?>
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>DASHBOARD</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
   
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><i>UNO STARS</i></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="dashboard.php">BACK</a></li>
                       <li><a href="../logout.php">LOGOUT</a></li>
				
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						
						<p></p>
					</header>

               
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
        <form name="join_game" action="" method="post">

<p>JOIN GAME</p>
<p><label>GAME ID</label>
  <span id="sprytextfield1">
  <input type="text" name="game" />
  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
<p><label>GAME PASSWORD</label>
  <span id="sprytextfield2">
  <input type="text" name="pass" />
  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
<p><input type="submit" name="join" value="JOIN" /><input type="reset" name="clear" value="CLEAR" /></p>
</form>
</div>


<div>
<p>PLAYERS ONLINE</p>


<?php

if(isset($_POST["join"]))
{
$gameid=$_POST["game"];
$password=$_POST["pass"];	





$sql1=mysql_query("SELECT * FROM players_online where game_id='$gameid' and player_id='$_SESSION[login_id]' ");
$row1=mysql_fetch_array($sql1);
$numof_rows = mysql_num_rows($sql1);
$numof_rows=$numof_rows+1;
$game_id1=$row1['game_id'];
$player1=$row1['player_id'];


$sql123=mysql_query("SELECT * FROM players_online where game_id='$gameid'");
$row123=mysql_fetch_array($sql123);
$numof_rows = mysql_num_rows($sql123);
$numof_rows=$numof_rows+1;


if($game_id1==$gameid && $player1==$_SESSION["login_id"])
{



$_SESSION["active_game"]=$gameid;	




echo "<script type='text/javascript'> alert(' GAME ALREADY JOINED !!');
window.location.href='join_game.php';
</script>";
exit();



}



$sql=mysql_query("SELECT * FROM games  where game_id='$gameid' and passwords='$password'");
$row =mysql_fetch_array($sql);

if ($row["game_id"]==$gameid && $row["passwords"]==$password)
{
	
	

	$sql20=" INSERT INTO players_online(id,game_id,player_id,dates,times,status,dice) VALUES  ('','$gameid','$_SESSION[login_id]','','','active','$numof_rows')"; 
$result20=mysql_query($sql20);
	$game_created=$row["created_by"];
echo "<p>GAME JOINED</p>";



$_SESSION["active_game"]=$gameid;
echo "====$_SESSION[active_game]";
$flag=1; 
}
else
{

echo "<p>TRY AGAIN</p>";





}


	
	
}

/*if($flag==1){


	$sql13=mysql_query("select u.id,u.first_name ,p.player_id from players_online p,users u where u.id=p.player_id and p.game_id=$_SESSION[active_game]");
$count=mysql_num_rows ($sql13);
while($row13 =mysql_fetch_array($sql13)){
	$count++;
$cardid3=$row13['first_name'];
echo "<p>";
echo "<input type='text' value='$cardid3' name='count$count'>";
echo "<input type='submit' name='send$count' value='REMOVE'>";
echo "</p>";
}

}
*/
?>
<br /><br />



</div>


<div>
<form action="" method="post">
<input type="submit" name="check" value="CHECK ONLINE" />

<?php
if(isset($_POST["check"])){

if(!isset($_SESSION["active_game"])){

echo "<h2>You havent Joined any game</h2>";	
}
else{
$count=0;
	$sql13=mysql_query("select u.id,u.first_name ,p.player_id,p.id from players_online p,users u where u.id=p.player_id and p.game_id=$_SESSION[active_game]");
//$count12=mysql_num_rows ($sql13);
while($row13 =mysql_fetch_array($sql13)){
	$count++;
$cardid3=$row13['first_name'];
$rem_id=$row13['id'];
echo "<p>";
echo "<input type='text' value='$cardid3' name='count$count'>";
//echo "<input type='button' name='send$count' value='REMOVE' onclick='remCompute($rem_id)'>";
echo "</p>";


$sql100=mysql_query("SELECT * FROM games  where game_id='$_SESSION[active_game]'");
$row100 =mysql_fetch_array($sql100);
$created_by=$row100['created_by'];
//echo "===$created_by";
//echo "$created_by";
if($count12>1 &&$_SESSION["login_id"]==$created_by )
$flag1=1;




}
}
?>
<label>PLAYERS JOINED </label>
<input  type="text" name="no_of_players" id="no_of_players" value="<?php if(isset($_SESSION["active_game"]))echo "$count12"; ?>" />
<?php
if($flag1==1)
	echo "<input type='submit' name='start' value='START GAME' id='start_game'  />";
else
echo "<h3>THE GAME ADMIN HAS TO START THE GAME PLEASE WAIT ....</h3>";}
?>
</form>

</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {minChars:4, maxChars:4});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {minChars:5, maxChars:5});
</script>
</body>
</html>

<?php

if(isset($_POST["start"])){
$players_joined= array();

$i=0;
$sql13=mysql_query("select u.id,u.first_name ,p.player_id,p.id from players_online p,users u where u.id=p.player_id and p.game_id=$_SESSION[active_game]");
//$count12=mysql_num_rows ($sql13);
while($row13 =mysql_fetch_array($sql13)){
	
$players_joined[$i]=$row13['player_id'];
$i++;
}

//$dist_card=new GiveCards;
//$dist_card->sendCards($players_joined,$_SESSION["active_game"]);


testing($players_joined,$_SESSION["active_game"]);
insert_leftcards($_SESSION["active_game"]);
}
?>
                		</div>
							</div>
						</div>
               
				
				</div>
                </form>
			</section>

<footer id="footer">
            <br>
            <br>
            <ul>
          <h5>FOR SUGGESSTIONS AND COMPLAINTS MAIL US AT <b> UNO STARSe@gmail.com</b></h5>
            </ul>
            <img src="../chits/images/Payday_Loan-512.png" height="100" width="125">
				<div class="inner">
                <h5>CONNECT US ON</h5>
                <br>
					<ul class="icons">
                        
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>
               
                    <h5><b>HEAD OFFICE :</b>50 feet road , BANGALORE-560001</h5>
					
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>