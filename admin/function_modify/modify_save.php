<?php 
include('../config.php');

if (isset ($_POST['id']));
if (isset ($_POST['fname']));
if (isset ($_POST['lname']));
if (isset ($_POST['gender']));
if (isset ($_POST['age']));
if (isset ($_POST['yearnsection']));


{

$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$yearnsection=$_POST['yearnsection'];


$query = mysql_query(" UPDATE `sdb`.`student_info` SET `id`=$id, `fname`='$fname',`lname`='$lname',`gender`='$gender',`age`=$age, `yearnsection`='$yearnsection' WHERE `id`=$id") 
or die(mysql_error());  
if($query){
}
header("location: modify_success.php?id=$id");
}
?>