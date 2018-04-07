
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>SIGN UP</title>
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
            <form action=""  method="post">
        <br>
        <br>
        <H2>SIGN UP</H2>
        <br>
      <p>
        <label>FIRST NAME</label>
        <span id="sprytextfield1">
        <input type="text" name="fname" />
        <span class="textfieldRequiredMsg">A value is required.</span></span></p>
        <br>
            <p>
        <label>LAST NAME</label>
        <span id="sprytextfield2">
        <input type="text" name="lname" />
        <span class="textfieldRequiredMsg">A value is required.</span></span></p>
        <br>
        
           <p>
        <label>EMAIL</label>
        <span id="sprytextfield3">
        <input type="text" name="email" />
        <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
        <br>
        <p>
        <label>PASSWORD</label>
        <span id="sprytextfield5">
        <input type="password" name="pass"  id="pass"/>
        <span class="textfieldRequiredMsg">A value is required.</span></span></p>
        <br>
        <p>
        <label>RETYPE PASSWORD</label>
        <span id="sprytextfield7">
        <input type="password" name="pass1" id="pass1" />
        <span class="textfieldRequiredMsg">A value is required.</span></span></p>
        <br>
           <p>
        <label>MOBILE</label>
        <span id="sprytextfield6">
        <input type="text" name="mobile" />
        <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
        <br>
          
        <br>
         <p>
        
        <input type="submit" name="login" value="LOGIN" onClick="verifyPass()" />
            
        <input type="reset" name="clear" value="CLEAR" />
        </p>
        
		        <BR>
                  </form>
            		</div>
							</div>
						</div>
               
				
				</div>
              
			</section>

<footer id="footer">
            <br>
            <br>
            <ul>
      
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
        <script>
		function verifyPass()
		{
			var n1=document.getElementById("pass").value;
			var n2=document.getElementById("pass1").value;
			
			if(n1!=n2)
			return false;
			
		}
		</script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {minChars:10, maxChars:10});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
    </script>
	</body>
</html>



  <?php
include '../../uno_connection.php';  
if(isset($_POST["login"]))
{
$fname=$_POST["fname"];

$lname=$_POST["lname"];
$email=$_POST["email"];

$pass=$_POST["pass"];
$mobile=$_POST["mobile"];




$sql20=" INSERT INTO `users`(`id`, `first_name`, `last_name`, `mobile`, `email`, `address`, `group_id1`, `group_id2`, `group_id3`, `dice`, `dice2`, `dice3`, `password`) VALUES('','$fname','$lname','$mobile','$email','','','','','','','','$pass')"; 
$result20=mysql_query($sql20);	


if($result20)
echo "<h2>SIGN UP SUCCESSFUL</h2>";
else

echo "<h2>PLEASE TRY AGAIN</h2>";

}

?>