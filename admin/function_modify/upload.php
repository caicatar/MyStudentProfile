<?php
include('../config.php');
if(is_uploaded_file($_FILES['userImage']['tmp_name']));
{
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$id=$_GET['id'];
$query = mysql_query("UPDATE `sdb`.`student_info` SET `image`='$imgData' WHERE `id`=$id") or die(mysql_error()); 
if($query)
{
header("location: student_modify.php?id=$id");
}
}
?>