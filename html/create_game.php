
<?php
if(isset($_POST["get"]))
{
	$game_id=rand(10,10000);
		$pass=rand(1000,100000);

	include '../class/create_game.php';
	
	$obj=new create_game();
	$ret=$obj->create($_SESSION["login_id"],$game_id,$pass);
	
	if($ret==1)
	{
		echo "success";
	}
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
                               <form name="create_game" method="post" action="">
<div>
<h2>CREATE GAME</h2>
<p><label>GAME ID</label><input type="text" name="gameid" value="<?php if(isset($_POST["get"]))
{ echo "$game_id";}?>" /></p>
<p><label>GAME PASSWORD</label><input type="text" name="gamepass" value="<?php if(isset($_POST["get"]))
{ echo "$pass";}?>" /></p>
<p><input type="submit" name="get" value="CREATE GAME" /></p>
</div>

</form>
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
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
    </script>
	</body>
</html>