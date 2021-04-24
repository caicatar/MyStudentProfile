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
					<li><a href="student_search.php"><span class="glyphicon glyphicon-search">
					  </span> Search</a></li>
                    <li><a href="../function_add/student_add.php"><span class="glyphicon glyphicon-plus">
					  </span> Add Student</a></li>
					<li><a href="../function_modify/student_delete.php"><span class="glyphicon glyphicon-edit">
					  </span> Modify Student List</a></li>
					<li><a href="../function_grading/section_search.php"><span class="glyphicon glyphicon-check">
					  </span> Grade Student</a></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="login.html">
					  <img src="/gradingsystem/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
			<h1 align="center">Section Profile</h1>
			<br>
 <?php 
	  $scode = $_GET['section_code']; 
      include("../config.php");
	  $sql = "SELECT * FROM student_section WHERE section_code=$scode";
	  $result=mysql_query($sql); 
	  if (mysql_num_rows($result) > 0) {
	  echo "<table cellpadding=1  rowspan=6 border=0 align=left>";
	  while($row=mysql_fetch_array($result)){ 
			  $yearnsection=$row['yearnsection']; 
			  	  $sql2="SELECT * FROM student_info WHERE yearnsection LIKE '%". $yearnsection ."%'";
	          $nuum=mysql_query($sql2);
	          $num = mysql_num_rows($nuum);
	          $scode=$row['section_code']; 
	  }
	  ?>
	  <div class=container>
	  <div class=well style="background-color:#87cefa">
	  <p align=center><img src="/gradingsystem/img/section.jpg" class=img-circle width=200 height=200 /></p>
	  <p align=center><font size=5 color=#2466f4><?php echo $yearnsection;?></font></p>
	  <p align=center><font size=5>Total Registered Students: <?php echo $num;?></font></p>

	  
	 <ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#attend">Students</a></li>
  </ul>

  <div class="tab-content">
    <div id="attend" class="tab-pane fade in active">
      <h3 align="center">Student's list:</h3>
	  <?php 
	  $db=mysql_connect  ("localhost", "root") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  $mydb=mysql_select_db("sdb"); 
	  $sql="SELECT * FROM student_info WHERE yearnsection LIKE '%" . $yearnsection.  "%' ORDER BY lname"; 
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
	  echo "<div class=well>";
	  echo "<div class=media>";
      echo "<div class=media-left>";
      echo "<img src=getImage.php?id=$ID  class=img-circle height=100px width=100px>";
	  echo "</div>";
      echo "<div class=media-body>";
      echo "<h4 class=media-heading><a href=../function_search/student_info.php?id=$ID>"  .$FirstName . " " . $LastName . "</a></h4>";
	  echo "<h5 class=media-heading><b> ID Number:</b>  " . $ID . "</h5>";
	  echo "<h5 class=media-heading><b>Year and Section:</b> ".$yearnsection ."</h5>";
	  echo "<h5 class=media-heading><b> Gender:</b>  " . $gender . "</h5>";
	  echo "<h5 class=media-heading><b> Age:</b>  " . $age . "</h5>";
      echo "</div>";
      echo "</div>";
	  echo "</div>";
	  } 
	  }
	  else
	  {
	  echo"<p>Name not found.</p>";
	  }
	  }
	  else
      { 
	  echo  "<p>Please enter a search query</p>"; 
	  }
	  ?>
      <p></p>
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