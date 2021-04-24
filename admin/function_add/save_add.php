<?php
include('../config.php');
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$yearnsection=$_POST['yearnsection'];
$section_code=$_POST['section_code'];
$query=("insert into `student_info`(`image`, `id`, `fname`, `lname`, `age`, `gender`, `yearnsection`) values ('$imgData',$id,'$fname','$lname',$age,'$gender','$yearnsection')");
$query3=("insert into `student_section` (`yearnsection`) values ('$yearnsection')");
$result=mysql_query($query) or die(mysql_error());
mysql_query($query3);
if($result)
{
header("location:student_add.php");
}
?>