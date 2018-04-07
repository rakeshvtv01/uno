<?php
session_start();
?>
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>WINNER</title>
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
					<li><a href="index.html">BACK</a></li>
				
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
                           
                  <?php
				  
				  echo "<h2>WINNER $_SESSION[winner_fname]

WINNER EMAIL $_SESSION[winner_email]
WINNER ID $_SESSION[winner_id]</h2>";
				  
				  ?>
                              
                		</div>
							</div>
						</div>
               
				
				</div>
              
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