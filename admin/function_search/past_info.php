<!DOCTYPE html>
<?php

include('../lock.php');
	  $studentid=$_GET['id'];
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
					  <img src="/gradingsystem/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
			<h1 align="center">Student Profile</h1>
			<br>
			<div class=container>
	  <div class=well style="background-color:#87cefa">
  <h1>Student ID: <?php echo $studentid; ?></h1>
  <h2>Record of past grades</h2>
  <p>This is the list of past grades by this student:</p>  
    <table class=table>
    <thead>
      <tr>
        <th>Year:</th>
        <th>English: (Q1,Q2,Q3,Q4) </th>
        <th>Mathematics: (Q1,Q2,Q3,Q4) </th>
        <th>Science: (Q1,Q2,Q3,Q4) </th>
       <th>Filipino: (Q1,Q2,Q3,Q4) </th>
      </tr>
    </thead>
 <?php  
      include("../config.php");
	  error_reporting(0);
	  $sql = "SELECT * FROM student_past_grades WHERE id=$studentid";
	  $result = mysql_query($sql); 
	  if (mysql_num_rows($result) > 0) {
	  while($row = mysql_fetch_array($result)) { 	  
			  $year = $row['yearnsection'];
			  $fname = $row['fname'];
			  $lname = $row['lname'];	  
//Past Quarter 1 Grades	
              $peng1 = $row['peng1'];
	          $pmath1  = $row['pmath1']; 
	          $pfil1 =$row['pfil1'];
              $psci1 =$row['psci1'];	
//Past Quarter 2 Grades			  
			  $peng2 = $row['peng2'];
	          $pmath2  =$row['pmath2']; 
	          $pfil2 =$row['pfil2'];
              $psci2 =$row['psci2'];		
//Past Quarter 3 Grades			  
			  $peng3 = $row['peng3'];
	          $pmath3  =$row['pmath3']; 
	          $pfil3 =$row['pfil3'];
              $psci3 =$row['psci3'];	
//Past Quarter 4 Grades			  
			  $peng4 = $row['peng4'];
	          $pmath4  =$row['pmath4']; 
	          $pfil4 =$row['pfil4'];
              $psci4 =$row['psci4'];
    echo "<tbody>";
      echo "<tr>";
        echo "<th><b>".$year."</b></td>";
        echo "<td>".$peng1."/".$peng2."/".$peng3."/".$peng4."</td>";
        echo "<td>".$pmath1."/".$pmath2."/".$pmath3."/".$pmath4."</td>";
        echo "<td>".$psci1."/".$psci2."/".$psci3."/".$psci4."</td>";
        echo "<td>".$pfil1."/".$pfil2."/".$pfil3."/".$pfil4."</td>";
	 echo "</tr>";
    echo "</tbody>";
	  }
	  }
	  else
	  {
		 echo "<p align=center>No saved grades for now.</p>";
	  }
	  ?>  
	  </table>	
<form action="student_info.php?id=<?php echo $studentid; ?>" method="post">
<p align="center"><input type="submit" class="btn-lg btn-primary" value="Return"></p>
</form>
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