<?php 
include('../config.php');
$id=$_GET['id'];
if (isset ($_POST['id']));
if (isset ($_POST['fname']));
if (isset ($_POST['lname']));
if (isset ($_POST['gender']));
if (isset ($_POST['age']));
if (isset ($_POST['yearnsection'])); 


{

$eng1=$_POST['eng1'];
$math1=$_POST['math1'];
$sci1=$_POST['sci1'];
$fil1=$_POST['fil1'];
$eng2=$_POST['eng2'];
$math2=$_POST['math2'];
$sci2=$_POST['sci2'];
$fil2=$_POST['fil2'];
$eng3=$_POST['eng3'];
$math3=$_POST['math3'];
$sci3=$_POST['sci3'];
$fil3=$_POST['fil3'];
$eng4=$_POST['eng4'];
$math4=$_POST['math4'];
$sci4=$_POST['sci4'];
$fil4=$_POST['fil4'];




$query = mysql_query("UPDATE `sdb`.`student_info` SET `eng1`='$eng1', `math1`='$math1', `sci1`='$sci1', `fil1`='$fil1',`eng2`='$eng2', `math2`='$math2', `sci2`='$sci2', `fil2`='$fil2',
 `eng3`='$eng3', `math3`='$math3', `sci3`='$sci3', `fil3`='$fil3', `eng4`='$eng4', `math4`='$math4', `sci4`='$sci4', `fil4`='$fil4' WHERE `id`=$id") or die(mysql_error());  
if($query){
}
header("location: student_gradesuccess2.php?id=$id");
}
?>