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
					<li><a href="../function_modify/student_delete.php"><span class="glyphicon glyphicon-edit">
					  </span> Modify Student List</a></li>
					<li class="active"><a href="../function_grading/section_search.php"><span class="glyphicon glyphicon-check">
					  </span> Grade Student</a></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="login.html">
					  <img src="/gradingsystem/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
		<div class="content">
			<div class="container">
				<div class="main">
					<h1 align="center">Section Search</h1>
					<hr>
					<h3 align=center>You can look up at a specific section here.</h3>
					<p align=center>Search for Sections.</p>
                    <form align=center class="form-inline" method="post" action="section_search.php?go"  id="searchform">
                    <input type="textarea" name="yearnsection" class="form-control"> 
					<input  type="submit" name="submit" class="btn btn-primary" value="Search">
	                </form>
	                <br>
					<?php 
	  if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[  a-zA-Z]{2,2}+/", $_POST['yearnsection'])){ 
	  $yearnsection=$_POST['yearnsection']; 
	  $db=mysql_connect  ("localhost", "root") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  $mydb=mysql_select_db("sdb"); 
	  $sql="SELECT * FROM student_section WHERE yearnsection LIKE '%" . $yearnsection .  "%'"; 
	  $result=mysql_query($sql); 
	  $sql2="SELECT * FROM student_info WHERE yearnsection LIKE '%". $yearnsection ."%'";
	  $nuum=mysql_query($sql2);
	  if (mysql_num_rows($result) > 0) {
	  while($row=mysql_fetch_array($result)){
	          $num = mysql_num_rows($nuum);
			  $yearnsection=$row['yearnsection']; 
	          $scode=$row['section_code'];
	  echo "<div class=well>";
	  echo "<div class=media>";
      echo "<div class=media-left>";
      echo "<img src=/gradingsystem/img/section.jpg class=img-circle height=100px width=100px>";
	  echo "</div>";
      echo "<div class=media-body>";
	  echo "<h5 class=media-heading><a href=section_info.php?section_code=$scode></b><font size=5>". $yearnsection ."</font></a></h5>";
	  echo "<h5 class=media-heading><b>Registered Student Number:</b>  " . $num . "</h5>";
      echo "</div>";
      echo "</div>";
	  echo "</div>";
	  } 
	  }
	  else
	  {
	  echo"<p align=center>Section not found.</p>";
	  }
	  }
	  else
      { 
	  echo  "<p align=center>Please type up to 3 characters</p>"; 
	  } 
	  }
	  }
	?> 
			</div>
		</div>
		<div class="footer">
			<div class="container">
			</div>
		</div>
	</body>
</html>