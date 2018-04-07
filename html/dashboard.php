<?php session_start();
include '../authent.php';
include '../../uno_connection.php';

include_once '../../uno/class/online_users.php';

$obj5=new OnlineUsers;

$obj5->update();

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
		        <link rel="icon"  type="image/png"  href="images/logo.png">
        <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
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
					<li><a href="../logout.php">LOGOUT</a></li>
				
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						
						<p></p>
					</header>

                <form action="../scripts/login_validate.php" method="POST" action="login_validate">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
                               
                               
                               
<h2>welcome to dashboard <?php echo "$_SESSION[name]->$_SESSION[login_id]";?></h2>

<div style="width:100px; height:25px; background-color: #333"><a href="play_dashboard.php" style="text-decoration:none; font-family:Verdana, Geneva, sans-serif ; font-size:12px; text-align:center" >play</a></div>
<br>
<div style="width:100px; height:25px; background-color: #333 "><a href="create_game.php" style="text-decoration:none; font-family:Verdana, Geneva, sans-serif ; font-size:12px; text-align:center" >create game</a></div>
<br>
<div style="width:100px; height:25px; background-color: #333 "><a href="join_game.php" style="text-decoration:none; font-family:Verdana, Geneva, sans-serif ; font-size:12px; text-align:center">join game</a>            </div><br>                               
                               
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
      
            </ul>
            <img src="../images/logo.jpg" height="100" width="125">
				
                <div class="inner">
                 <h5><b> ultimate fun</h5>
                 <br>
                 <br>
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
               
                   
					
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
    </script>
	</body>
</html>