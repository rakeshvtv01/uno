<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<script>

var seconds = 60;

function secondPassed() {

	var minutes = Math.round((seconds - 30)/60);

	var remainingSeconds = seconds % 60;

	if (remainingSeconds < 10) {

		remainingSeconds = "0" + remainingSeconds;	

	}

	document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;

	if (seconds == 0) {

		clearInterval(countdownTimer);

		document.getElementById('countdown').innerHTML = "Buzz Buzz";

	} else {

		seconds--;

	}

}



var countdownTimer = setInterval('secondPassed()', 1000);

</script>

</head>

<body>
<form action="/uno/class/login_val.php" method="post" name="login">
<p>
<label>USERNAME /EMAIL</label><input type="text" name="uname" /></p>
<p><label>PASSWORD </label><input type="password" name="pass" /></p>
<p><input type="submit" name="login" value="LOGIN" /><input type="reset" name="res" value="CLEAR" /></p>

</form>

<span id="countdown" class="timer"></span>
</body>
</html>