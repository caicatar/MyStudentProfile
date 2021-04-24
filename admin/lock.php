<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select username, adminid from admin_info where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);

$adid = $row['adminid']; 
$login_session=$row['username'];

if(!isset($login_session))
{
header("Location: main.php");
}
?>
