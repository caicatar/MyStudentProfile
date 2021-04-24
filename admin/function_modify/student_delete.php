<?php

include('../lock.php');

?>
<?php

$host="localhost"; 
$username="root"; 

$db_name="sdb"; 
$tbl_name="student_info"; 

// Connect to server and select databse.
mysql_connect("$host", "$username")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
	  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyStudentProfile.com</title>
    <link href="/gradingsystem/css/bootstrap.min.css" rel="stylesheet">
	<script src="/gradingsystem/js/jquery-3.1.1.min.js"></script>
	<script src="/gradingsystem/js/bootstrap.min.js"></script>
	  
  </head>
  <body>
<div class="header">
			<div class="container">
			<div class="jumbotron text-center">
            <h1>MyStudent Profile</h1>
            <p>Look at your grades, anytime, anywhere.</p> 
             </div>
			</div>
		    </div>
			<nav class="navbar navbar-default">
                   <div class="container-fluid">
                    <div class="navbar-header">
                     <a class="navbar-brand" href="#">MyStudentProfile</a>
                    </div>
            <ul class="nav navbar-nav">
                    <li><a href="../main.php"><span class="glyphicon glyphicon-home">
					  </span> Home</a></li>
					<li><a href="../function_search/student_search.php"><span class="glyphicon glyphicon-search">
					  </span> Search</a></li>
                    <li><a href="../function_add/student_add.php"><span class="glyphicon glyphicon-plus">
					  </span> Add Student</a></li>
					<li class="active"><a href="student_delete.php"><span class="glyphicon glyphicon-edit">
					  </span> Modify Student List</a></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="login.html">
					  <img src="/mystudentprofile/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
			<div class="container">
				<div class="main">
					<h1 align="center">Modify and Delete Information</h1>
					<hr> 
									<div class="well">
<table class="table-condensed" width="400" border="0" cellspacing="1" cellpadding="0" align=center>
<tr>
<td><form name="form1" method="post" action="">
<table class="table-condensed" width="400" border="0" cellpadding="3" cellspacing="1">
<tr>
<td>&nbsp;</td>
<td colspan="5"><center><strong>Delete/Modify Information</strong> </center></td>
</tr>
<tr>
<td align="center"><strong>Check</strong></td>
<td align="center"><strong>Id</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Lastname</strong></td>
<td align="center"><strong>Gender</strong></td>
<td align="center"><strong>Year and Section</strong></td>
</tr>
<?php
while($rows=mysql_fetch_array($result)){
?>
<tr>
<td align="center">
<input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>" onchange="document.getElementById('delete').disabled = !this.checked; document.getElementById('modify').disabled = !this.checked;">
</td>
<td><?php echo $rows['id']; ?></td>
<td><?php echo $rows['fname']; ?></td>
<td><?php echo $rows['lname']; ?></td>
<td><?php echo $rows['gender']; ?></td>
<td><?php echo $rows['yearnsection']; ?></td>
</tr>
<?php
}
?>

<tr>
<td colspan="5" align="center">
<br>
<form name="botton">
<button type="button" id="modify" class="btn btn-primary" data-toggle="modal" data-target="#modifymodal" disabled>Modify</button>
</form>
<!-- Modal -->
<div id="modifymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modify Student?</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to modify this student?</p>
      </div>
      <div class="modal-footer">
		<input type=Submit name="mod_yes" class="btn btn-primary" value=Yes>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>

<button type="button" id="delete" class="btn btn-primary" data-toggle="modal" data-target="#deletemodal" disabled>Delete</button>
<!-- Modal -->
<div id="deletemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Student?</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this student?</p>
      </div>
      <div class="modal-footer">
		<input type=Submit class="btn btn-primary" name=del_yes value=Yes>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
</td>
</tr>
<?php
 if (isset ($_POST["mod_yes"]))
 if(isset($_POST['checkbox'])){ 
 for($i=0;$i<count($_POST['checkbox']);$i++){ 
 $mod_id = $_POST['checkbox'][$i]; 
 $sql = "SELECT * FROM $tbl_name WHERE id='$mod_id'"; 
$result = mysql_query($sql); 
} 
if($result)
{
header("location:student_modify.php?id='$mod_id'");
}
}
?>
<?php
 if (isset ($_POST["del_yes"]))
 if(isset($_POST['checkbox'])){ 
 for($i=0;$i<count($_POST['checkbox']);$i++){ 
 $del_id = $_POST['checkbox'][$i]; 
 $sql = "SELECT * FROM $tbl_name WHERE id='$del_id'"; 
$result = mysql_query($sql); 
} 
if($result)
{
header("location:delete_ok.php?id='$del_id'");
}
}
?>
</table>
</form>
</td>
</tr>
</table>
</div>
					<hr>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="container">
			</div>
		</div>
	</body>
</html>