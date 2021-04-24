<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$admid=$_POST['adminid'];
$myusername=addslashes($_POST['username']); 
$mypassword=addslashes($_POST['password']);
$sql="SELECT '$admid' FROM admin_info WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$active=$row['active'];
$admid=$row['adminid'];
$count=mysql_num_rows($result);
if($count==1)
{
session_register("myusername");
$_SESSION['login_user']=$myusername;

header("location: main.php");
}
else 
{
header("location: ../error.html");
}
}
?>
