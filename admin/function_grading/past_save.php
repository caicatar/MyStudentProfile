<?php 
include('../config.php');
$id=$_GET['id'];
if (isset ($_POST['id']));
if (isset ($_POST['fname']));
if (isset ($_POST['lname']));
if (isset ($_POST['yearnsection'])); 


{
$fname=$_POST['lname'];
$lname=$_POST['lname'];
$yearnsection=$_POST['yearnsection'];
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




$query = ("INSERT INTO `student_past_grades` (`id`,`yearnsection`,`peng1`, `pmath1`, `psci1`, `pfil1`,`peng2`, `pmath2`, `psci2`, `pfil2`,
 `peng3`, `pmath3`, `psci3`, `pfil3`, `peng4`, `pmath4`, `psci4`, `pfil4`,`fname`,`lname`) VALUES ($id,'$yearnsection',$eng1,$math1,$sci1,$fil1,$eng2,$math2,$sci2,$fil2,$eng3,$math3,$sci3,$fil3,$eng4,$math4,$sci4,$fil4,'$fname','$lname')");
$result=mysql_query($query);
if($result)
{
header("location: student_gradesuccess.php?id=$id");
}
else 
{
header("location: student_grade_error.php?id=$id");
}
}
?>