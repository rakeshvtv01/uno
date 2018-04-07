<?php session_start();
include '../../uno_connection.php';




?>

<?php

if(isset($_POST["login"]))
{
$email=$_POST["uname"];

$pass=$_POST["pass"];
$email1=strlen($email);
$pass1=strlen($pass);


$sql=mysql_query("SELECT * FROM users  where email='$email' and password='$pass'");
$row =mysql_fetch_array($sql);

$fname=$row['fname'];

$email=$row['email'];
$id=$row['id'];



if($email1 >0 && $pass1 >0){
if ($row["email"]==$email && $row["password"]==$pass)
{
	
	echo"insiode if";
$sql=mysql_query("SELECT * FROM users  where email='$email' and password='$pass'");
$row =mysql_fetch_array($sql);
$_SESSION["name"]=$row['first_name'];
$_SESSION["emailid"]=$row['email'];
$_SESSION["mobil"]=$row['mobile'];
$_SESSION["login_id"]=$row['id'];
//$_SESSION["filename"]=$row['filename'];




header('Location:../html/dashboard.php');

 
}
else
{





echo "<script type='text/javascript'> alert('WRONG PASSWORD');
window.location.href='../html/login.php';
</script>";


}
}
else
{
	/*
echo "<script type='text/javascript'> alert('PASSWORD OR USERNAME CANNOT BE EMPTY');
window.location.href='../html/login.php';
</script>";
*/
}

}


?>