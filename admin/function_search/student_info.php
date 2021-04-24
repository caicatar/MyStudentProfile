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
    <link href="/mystudentprofile/css/bootstrap.min.css" rel="stylesheet">
	<script src="/mystudentprofile/js/jquery-3.1.1.min.js"></script>
    <script src="/mystudentprofile/js/bootstrap.min.js"></script>
  </head>
  <body>
<div class="header">
</div>
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
					<li class="active"><a href="student_search.php"><span class="glyphicon glyphicon-search">
					  </span> Search</a></li>
                    <li><a href="../function_add/student_add.php"><span class="glyphicon glyphicon-plus">
					  </span> Add Student</a></li>
					<li><a href="../function_modify/student_delete.php"><span class="glyphicon glyphicon-edit">
					  </span> Modify Student List</a></li>

            </ul>
			<ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="login.html">
					  <img src="/mystudentprofile/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
			<h1 align="center">Student Profile</h1>
			<br>
 <?php 
	  $studentid=$_GET['id']; 
      include("../config.php");
	  $sql = "SELECT * FROM student_info WHERE id=$studentid";
	  $result=mysql_query($sql); 
	  if (mysql_num_rows($result) > 0) {
	  while($row=mysql_fetch_array($result)){ 
	          $Image = $row['image'];
	          $FirstName  =$row['fname']; 
	          $LastName=$row['lname'];
              $gender=$row['gender'];			  
			  $age=$row['age']; 
			  $yearnsection=$row['yearnsection']; 
	          $ID=$row['id']; 
//Quarter 1 Grades			  
			  $eng1 = $row['eng1'];
	          $math1  =$row['math1']; 
	          $fil1 =$row['fil1'];
              $sci1 =$row['sci1'];	
//Quarter 2 Grades			  
			  $eng2 = $row['eng2'];
	          $math2  =$row['math2']; 
	          $fil2 =$row['fil2'];
              $sci2 =$row['sci2'];		
//Quarter 3 Grades			  
			  $eng3 = $row['eng3'];
	          $math3  =$row['math3']; 
	          $fil3 =$row['fil3'];
              $sci3 =$row['sci3'];	
//Quarter 4 Grades			  
			  $eng4 = $row['eng4'];
	          $math4  =$row['math4']; 
	          $fil4 =$row['fil4'];
              $sci4 =$row['sci4'];				  
	  }
	  }
	  ?>
	  <div class=container>
	  <div class=well style="background-color:#87cefa">
	  <p align=center><img src=getImage.php?id=<?php echo $ID;?> class=img-circle width=200 height=200 /></p>
	  <p align=center><font size=5 color=#2466f4><?php echo $LastName; ?>, <?php echo $FirstName;?></font></p>
	  <p align=center>Student ID Number:<?php echo $ID;?></p>
	  <p align=center>Gender:<?php echo $gender;?></p>
	  <p align=center>Age:<?php echo $age;?></p>
	  <p align=center>Year and Section:<?php echo $yearnsection;?></p>
	  <form action="../function_grading/student_grade.php?id=<?php echo $ID; ?>" method="post">
      <p align="center"><input type="submit" class="btn-lg btn-primary" value="Grade Student"></p>
	   </form>
	  <form action="../function_modify/student_modify.php?id=<?php echo $ID; ?>" method="post">
      <p align="center"><input type="submit" class="btn-lg btn-primary" value="Modify Student Info"></p>
	   </form>
	   <br><br>
	   
	<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#q1">First Quarter Grades</a></li>
    <li><a data-toggle="tab" href="#q2">Second Quarter Grades</a></li>
    <li><a data-toggle="tab" href="#q3">Third Quarter Grades</a></li>
    <li><a data-toggle="tab" href="#q4">Fourth Quarter Grades</a></li>
	<li><a href="past_info.php?id=<?php echo $studentid; ?>#pg">Past Grades</a></li>
     </ul>

  <div class="tab-content">
    <div id="q1" class="tab-pane fade in active">
      <h3 align="center">First Quarter Grades</h3>
	  <br>
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">English</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $eng1; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Mathematics</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $math1; ?></font></p></div>
	  </div>
    </div>
	</div>
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Science</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $sci1; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Filipino</p></div>
      <div class="panel-body"><p align="center"><font size=25px><?php echo $fil1; ?><b></b></font></p></div>
	  </div>
    </div>
	  </div>
    </div>
	
	<div id="q2" class="tab-pane fade">
      <h3 align="center">Second Quarter Grades</h3>
      <br>
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">English</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $eng2; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Mathematics</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $math2; ?></font></p></div>
	  </div>
    </div>
	</div>
	
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Science</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $sci2; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Filipino</p></div>
      <div class="panel-body"><p align="center"><font size=25px color=red><b><?php echo $fil2; ?></b></font></p></div>
	  </div>
    </div>
	</div>
    </div>
	
    <div id="q3" class="tab-pane fade">
      <h3 align="center">Third Quarter Grades</h3>
      <br>
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">English</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $eng3; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Mathematics</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $math3; ?></font></p></div>
	  </div>
    </div>
	</div>
	
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Science</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $sci3; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Filipino</p></div>
      <div class="panel-body"><p align="center"><font size=25px color=red><b><?php echo $fil3; ?></b></font></p></div>
	  </div>
    </div>
	</div>
    </div>

	
	<div id="q4" class="tab-pane fade">
      <h3 align="center">Fourth Quarter Grades</h3>
      <br>
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">English</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $eng4; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Mathematics</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $math4; ?></font></p></div>
	  </div>
    </div>
	</div>
	
	  <div class="row">
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Science</p></div>
      <div class="panel-body"><p align="center"><font size=20px><?php echo $sci4; ?></font></p></div>
	  </div>
    </div>
	  <div class="col-sm-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><p align="center">Filipino</p></div>
      <div class="panel-body"><p align="center"><font size=25px color=red><b><?php echo $fil4; ?></b></font></p></div>
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
		<div class="footer">
			<div class="container">
			</div>
		</div>
	</body>
</html>