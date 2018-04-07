<?php

if((!isset($_SESSION['login_id']) && $_SESSION['login_id']=="")){
header('Location:../html/index.html');
}
else if($_SESSION['login_id']=="")
{
header('Location:../html/index.html');
}
else if(!isset($_SESSION['login_id']))
{
	header('Location:../html/index.html');
}