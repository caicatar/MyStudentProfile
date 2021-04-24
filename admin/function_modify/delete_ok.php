<?php
include('../config.php');
$ID=$_GET['id'];
$query=("DELETE FROM student_info WHERE id=$ID");
$result=mysql_query($query) or die(mysql_error());
if($result)
{
header("location:delete_done.php");
}
else
{
header("location:delete_error.php");
}
?>