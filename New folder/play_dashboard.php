<?php session_start();
include '../../uno_connection.php';
include '../authent.php';
//include '../logout.php';
include 'check_winner.php';

if(!isset($_SESSION["active_game"]))
{
	

echo "<script type='text/javascript'> alert('You have to join a Game');
window.location.href='../html/dashboard.php';
</script>";


	
	
}

//query to extract the dice of the player

$sql20=mysql_query("SELECT * FROM `games` WHERE  game_id='$_SESSION[active_game]'");
$row20 =mysql_fetch_array($sql20);

$find_out_whose_turn=$row20['whose_turn'];

//


	$ur_cards=array();

	$i=0;
$sql10=mysql_query("SELECT * FROM plays_online WHERE player_id ='$_SESSION[login_id]' and game_number='$_SESSION[active_game]'");
while($row10 =mysql_fetch_array($sql10))
{
	$ur_cards[$i]=$row10['card_id'];
	


$i=$i+1;

}

$sql11=mysql_query("SELECT * FROM players_online WHERE player_id ='$_SESSION[login_id]' and game_id='$_SESSION[active_game]'");
$row11=mysql_fetch_array($sql11);
$turn_login_id=$row11['dice'];
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
		
<meta http-equiv="refresh" content="10">

        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
        
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
   
<style>
h5{visibility:hidden;
}
img{height:200px;
width:100px;
}
</style>

<script>
var paragraphs1=  document.getElementsByTagName("h5");
var login_org=<?php echo " $_SESSION[login_id]"?>;
function findWinner()
{ 

//alert(""+login_org);
var login_id=document.getElementById("login_id").value;
	if(paragraphs1.length==0)
window.open ('winner_update.php?loginid='+login_org,'_self',false)	;	
}

function calVal(){


var login_id=document.getElementById("login_id").value;
var whose_turn=document.getElementById("whose_turn").value;

if(login_id!=whose_turn){
alert("its not your turn");	
return false;
}

	
	var flag=0;
	var colors=document.getElementById("colorText").value;
	var content=document.getElementById("content").value;
	
	
	var check_before=new Array();
	var sub_color=new Array();
	var sub_content=new Array();
var paragraphs = document.getElementsByTagName("h5");
 paragraphs1 = document.getElementsByTagName("h5");

//alert(""+paragraphs1.length)
for(var i = 0; i < paragraphs.length; i++)
{
    
	check_before[i]=paragraphs[i].innerHTML;
	
}

for(var i = 0; i < check_before.length; i++)
{
   //alert("insode fro");
	var encode=check_before[i];
	var ext_col=encode.substring(0, encode.indexOf("-"));
	var ext_num=encode.substring( encode.indexOf("-")+1, encode.indexOf("+"));
	var ext_id=encode.substring( encode.indexOf("+")+1,encode.indexOf("*"));


	var send_cardid=encode.substring( encode.indexOf("+")+1,encode.indexOf("*"));
	var send_id=encode.substring( encode.indexOf("*")+1,encode.length);	
		 
	
	//alert("ext col"+ext_col+"colors"+colors);

if(ext_col==colors || ext_num==content){
flag=1;

}	
}

if(flag==0){
window.open ('send_to_pilecards.php?loginid='+send_id+"&whose_turn="+whose_turn,'_self',false)	
}
if(flag==1){
	alert("you have cards to play");
}

}


function evaluateCount1()
{


var login_id=document.getElementById("login_id").value;
var whose_turn=document.getElementById("whose_turn").value;

if(login_id!=whose_turn){
alert("its not your turn");	
return false;
}
var n1=document.getElementById("abcd").innerHTML;
alert("hello"+n1);	
}



function evaluateCount(x)
{
	var login_id=document.getElementById("login_id").value;
var whose_turn=document.getElementById("whose_turn").value;

if(login_id!=whose_turn){
alert("its not your turn");	
return false;
}
	
	
	
	var str=document.getElementById(x).alt;
	
	
	var str5=document.getElementById("colorText").value
	var str6=document.getElementById("content").value;
	
	
	var str1=str.substring(0, str.indexOf("-"));
	var str2=str.substring( str.indexOf("-")+1, str.indexOf("+"));
	var str3=str.substring( str.indexOf("+")+1,str.length);

//alert("s"+str.substring( str.indexOf("-")+1, str.indexOf("+")));

if(str1==str5 && str2=="d2"){
	
	window.open ('card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=draw2&order=nil",'_self',false)
	
}

else if(str1==str5 && str2=="rev"){
	
	window.open ('card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=rev&order=nil",'_self',false)
	
}
else if(str1==str5 && str2=="skip"){
	
	window.open ('card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=skip&order=nil",'_self',false)
	
}
else if(str1=="nil" && str2=="wc"){
	var flag=0;
	
	while(flag==0){
	var n=window.prompt("DECIDE THE NEXT COLOR<br /> red blue green yellow");
	if(n=="red"|| n=="blue"|| n=="green" || n=="yellow")
	{
		flag=1;
		
	}
	}

		window.open ('card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=wc&order="+n,'_self',false)
}
else if(str1=="nil" && str2=="wc4"){
	
		var flag=0;
	
	while(flag==0){
	var n=window.prompt("DECIDE THE NEXT COLOR<br /> red blue green yellow");
	if(n=="red"|| n=="blue"|| n=="green" || n=="yellow")
	{
		flag=1;
		
	}
	}
	
	window.open ('card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=wc4&order="+n,'_self',false)
	
}

else if(str1== str5 || str2==str6)
{

	
	window.open ('card_update.php?cardid='+str3+"&whose_turn="+whose_turn+"&type=no&order=nil",'_self',false)
}
else
//return false;
alert("Cards dont match");

}

</script>

	</head>
	<body onLoad="findWinner()">

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
                                <input type="text" id="disp">
<form  method="get" name="">
<?php

$sql21=mysql_query("SELECT * FROM `games` WHERE  game_id='$_SESSION[active_game]'");
$row21 =mysql_fetch_array($sql21);

$temp_color=$row20['next_order'];


$sql13=mysql_query("select * from plays_online where piled='yes' and player_id=0 order by dates DESC, times DESC ");
$row13 =mysql_fetch_array($sql13);


	$cardid3=$row13['card_id'];
	
		
		$sql14=mysql_query("SELECT * FROM uno_cards WHERE card_id ='$cardid3'");
$row14 =mysql_fetch_array($sql14);
//echo "temp color= $temp_color <br>";
if($temp_color=="nil"){
//	echo "insode nil";
	$color3=$row14['card_color'];
		$cont3=$row14['content'];
		$jpg=".jpg";
		$concat=$color3.$cont3.$jpg;
//		echo "hi $concat hello";

}
else{
	
$color3=$temp_color;
$cont3=$row14['content'];
		$jpg=".jpg";
		$concat=$color3.$cont3.$jpg;
//		echo "hi $concat hello";
//echo "isode color";
$concat=$temp_color.$jpg;

}
?>
<!--please update with the piled cards i.e $concat-->

<table>

<tr>
<td>
<a href="piled_update.php"><img src="<?php echo"../images/$concat";?>" alt="no image "  style="width:250px; height:400px"/> </a>
</td>
<td>

<img src="../images/uno.jpg" alt="send image "  style="width:250px; height:400px" onclick="calVal()" />
</td>
</tr>

</table>

<div id="abc" style="top:200px; left:50px">
<p>
<table>
<tr>
<?php
$id_count=1;
foreach($ur_cards as $cardno)
{
	
$sql11=mysql_query("SELECT * FROM uno_cards WHERE card_id ='$cardno'");
$row11 =mysql_fetch_array($sql11);

	$color=$row11['card_color'];
		$cont=$row11['content'];
	echo "<td><a  onclick='evaluateCount($id_count)'  ><img id='$id_count' alt='$color-$cont+$cardno' src='../images/$color$cont.jpg' ></img></a></td>";
		echo "<input value='$color-$cont' type='hidden' class='divinput'>";
			echo "<h5>$color-$cont+$cardno*$_SESSION[login_id]</h5>";
	
$id_count=$id_count+1;
//echo "$color$cont.jpg==";
}
?>
</tr>
</table>
</p>
</div>


<input type="hidden" id="colorText" value="<?php echo "$color3"; ?>" />
<input type="hidden" id="content" value="<?php echo "$cont3"; ?>" />
<input type="hidden" id="cardids" value="<?php echo "$cont3"; ?>" />

<input type="text" id="whose_turn" value="<?php echo "$find_out_whose_turn"; ?>" onclick="dispWhose()" />
<input type="text" id="login_id" value="<?php echo "$turn_login_id"; ?>" />


</form>
<script>
function dispWhose()
{
var n1=document.getElementById("whose_turn").value;
var n2=document.getElementById("login_id").value;	
var m1="It's Your Turn";
if(n1==n2)
{
	//alert("hi"+n1+n2);
	document.getElementById("disp").value=m1;
}
}
</script>
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
          <h4><i>Uno Stars</i></h4>
            </ul>
            <img src="../chits/images/Payday_Loan-512.png" height="100" width="125">
				<div class="inner">
                <h4>CONNECT US ON</h4>
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

<script>
function findTurn()
{
var login_id=document.getElementById("login_id").value;
var whose_turn=document.getElementById("whose_turn").value;

alert("");
if(login_id==whose_turn){
alert("its not your turn");	
}

}

function redCal()
{
var login_id=document.getElementById("login_id").value;
var whose_turn=document.getElementById("whose_turn").value;

if(login_id==whose_turn){
alert("its not your turn");	
return false;
}	
window.open ('card_update.php?cardid='+"&whose_turn="+whose_turn,'_self',false);	
}

</script>