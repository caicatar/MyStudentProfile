<!DOCTYPE html>
<?php

include('../lock.php');

?>
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
					  <img src="../img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
			<div class="container">
				<div class="main">
					<h1 align="center">Modify Student's Grade</h1>
					<hr>
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
					<div class="well" style="align:center">
<?php
include('../config.php');
   $ID = $_GET['id'];
   $query="SELECT * FROM student_info WHERE id=$ID";
   $result=mysql_query($query);
   $count=mysql_num_rows($result);
if ($count>=1){
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
	 $FirstName  =$row['fname']; 
	 $LastName=$row['lname'];
	 $yearnsection=$row['yearnsection']; 
	 $ID=$row['id']; 
	 $eng1=$row['eng1'];
$math1=$row['math1'];
$sci1=$row['sci1'];
$fil1=$row['fil1'];
$eng2=$row['eng2'];
$math2=$row['math2'];
$sci2=$row['sci2'];
$fil2=$row['fil2'];
$eng3=$row['eng3'];
$math3=$row['math3'];
$sci3=$row['sci3'];
$fil3=$row['fil3'];
$eng4=$row['eng4'];
$math4=$row['math4'];
$sci4=$row['sci4'];
$fil4=$row['fil4'];
}
}
?>
<form class="form-inline" name="frmImage" enctype="multipart/form-data" action="grade_save.php?id=<?php echo $ID; ?>" method="post" class="frmImageUpload">
<p align="center"><img src=getImage.php?id=<?php echo $ID; ?> class="img-circle" height="100px" width="100px" id="image" /></p>
<p align="center"><font color="blue"><b><a href="../function_search/student_info.php?id=<?php echo $ID; ?>"><?php echo $LastName;?>, <?php echo $FirstName;?></a></b></font></p>
<p align="center"><font color="blue">ID number: <?php echo $ID; ?></font></p>
<p align="center"><font color="blue">Year and Section: <?php echo $yearnsection; ?></font></p>
<div class="form-group">
</div>
<br>	
<br>	
<br>
<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#q1">Q1</a></li>
    <li><a data-toggle="pill" href="#q2">Q2</a></li>
    <li><a data-toggle="pill" href="#q3">Q3</a></li>
    <li><a data-toggle="pill" href="#q4">Q4</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="q1" class="tab-pane fade in active">
<div class="form-group">
<br>
<p align="center">First Quarter Grades</p>
<p align="center">English: <input class="form-control" type=text name=eng1 maxlength=2 value=<?php echo $eng1;?>></p>
<p align="center">Mathematics: <input class=form-control type=text name=math1 maxlength=2 value=<?php echo $math1;?>></p>
<p align="center">Science: <input class="form-control" type=text name=sci1 maxlength=2 value=<?php echo $sci1; ?>></p>
<p align="center">Filipino: <input class="form-control" type=text name=fil1 maxlength=2 value=<?php echo $fil1;?>></p>
</p>
</div>
    </div>
    <div id="q2" class="tab-pane fade">
<div class="form-group">
<br>
<p align="center">Second Quarter Grades</p>
<p align="center">English: <input class="form-control" type=text name=eng2 maxlength=2 value=<?php echo $eng2;?>></p>
<p align="center">Mathematics: <input class=form-control type=text name=math2 maxlength=2 value=<?php echo $math2;?>></p>
<p align="center">Science: <input class="form-control" type=text name=sci2 maxlength=2 value=<?php echo $sci2;?>></p>
<p align="center">Filipino: <input class="form-control" type=text name=fil2 maxlength=2 value=<?php echo $fil2;?>></p>
</p>
</div>
    </div>
    <div id="q3" class="tab-pane fade">
<div class="form-group">
<br>
<p align="center">Third Quarter Grades</p>
<p align="center">English: <input class="form-control" type=text name=eng3 maxlength=2 value=<?php echo $eng3;?>></p>
<p align="center">Mathematics: <input class=form-control type=text name=math3 maxlength=2 value=<?php echo $math3;?>></p>
<p align="center">Science: <input class="form-control" type=text name=sci3 maxlength=2 value=<?php echo $sci3;?>></p>
<p align="center">Filipino: <input class="form-control" type=text name=fil3 maxlength=2 value=<?php echo $fil3;?>></p>
</p>
</div>
    </div>
    <div id="q4" class="tab-pane fade">
<div class="form-group">
<br>
<p align="center">Fourth Quarter Grades</p>
<p align="center">English: <input class="form-control" type=text name=eng4 maxlength=2 value=<?php echo $eng4; ?>></p>
<p align="center">Mathematics: <input class=form-control type=text name=math4 maxlength=2 value=<?php echo $math4; ?>></p>
<p align="center">Science: <input class="form-control" type=text name=sci4 maxlength=2 value=<?php echo $sci4; ?>></p>
<p align="center">Filipino: <input class="form-control" type=text name=fil4 maxlength=2 value=<?php echo $fil4; ?>></p>
</p>
</div>
    </div>
  </div>

<div="form-group">
<div class="form-inline">
<p align="center"><input data-toggle="modal" data-target="#savesuccessmodal" type=button name=edit class="btn-lg btn-primary" value=Edit></p>
<div id="savesuccessmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Save?</h4>
      </div>
      <div class="modal-body">
                    <p align=center>Save changes?</p>
      </div>
      <div class="modal-footer">
	  <input type=submit name=cancel class="btn btn-primary" value=Ok>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
</form>
<form action="../function_search/student_info.php?id=<?php echo $ID; ?>" method="post">
<p align="center"><input type=submit class="btn-lg btn-primary" value="Cancel"></p>
</form>
<form action="past_save.php?id=<?php echo $ID; ?>" method="post">
<input type="hidden" name=fname maxlength=25 value=<?php echo $FirstName;?>>
<input type="hidden" name=lname maxlength=25 value=<?php echo $LastName;?>>
<input type="hidden" name=yearnsection maxlength=25 value=<?php echo $yearnsection; ?>>
<input type="hidden" name=eng1 maxlength=2 value=<?php echo $eng1;?>>
<input type="hidden" name=math1 maxlength=2 value=<?php echo $math1;?>>
<input type="hidden" name=sci1 maxlength=2 value=<?php echo $sci1; ?>>
<input type="hidden" name=fil1 maxlength=2 value=<?php echo $fil1;?>>
<input type="hidden" name=eng2 maxlength=2 value=<?php echo $eng2;?>>
<input type="hidden" name=math2 maxlength=2 value=<?php echo $math2;?>>
<input type="hidden" name=sci2 maxlength=2 value=<?php echo $sci2;?>>
<input type="hidden" name=fil2 maxlength=2 value=<?php echo $fil2;?>>
<input type="hidden" name=eng3 maxlength=2 value=<?php echo $eng3;?>>
<input type="hidden" name=math3 maxlength=2 value=<?php echo $math3;?>>
<input type="hidden" name=sci3 maxlength=2 value=<?php echo $sci3;?>>
<input type="hidden" name=fil3 maxlength=2 value=<?php echo $fil3;?>>
<input type="hidden" name=eng4 maxlength=2 value=<?php echo $eng4; ?>>
<input type="hidden" name=math4 maxlength=2 value=<?php echo $math4; ?>>
<input type="hidden" name=sci4 maxlength=2 value=<?php echo $sci4; ?>>
<input type="hidden" name=fil4 maxlength=2 value=<?php echo $fil4; ?>>
<p align="center"><input type=submit class="btn-lg btn-primary" value="Save Student Grade"></p>
</form>
			</div>
			</div>
			</div>

  </div>
</div>

</div>
</div>
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