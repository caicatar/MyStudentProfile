<!DOCTYPE html>
<?php

include('lock.php');
?>
<?php
      include('config.php');
	  $sql = "SELECT * FROM admin_info WHERE adminid=$adid";
	  $result=mysql_query($sql); 
	  if (mysql_num_rows($result) > 0) {
	  echo "<table cellpadding=1  rowspan=6 border=0 align=left>";
	  while($row=mysql_fetch_array($result)){ 
	          $img = $row['imejii'];
			   $adid=$row['adminid']; 
			   }
	  }
	  ?>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyStudentProfile.com</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	  
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
                    <li><a href="main.php"><span class="glyphicon glyphicon-home">
					  </span> Home</a></li>
					<li><a href="function_search/student_search.php"><span class="glyphicon glyphicon-search">
					  </span> Search</a></li>
                    <li><a href="function_add/student_add.php"><span class="glyphicon glyphicon-plus">
					  </span> Add Student</a></li>
					<li><a href="function_modify/student_delete.php"><span class="glyphicon glyphicon-edit">
					  </span> Modify Student List</a></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="login.html">
					  <img src="/mystudentprofile/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
		<div class="content">
			<div class="container">
				<div class="main">
					<h1 align="center">Welcome</h1>
					<hr> 
				   <h1 align="center"><img src="/gradingsystem/img/icon-user.png" class="img-circle" height=150px width=150px></h1>
				 <div class="well">
                   <h1 align="center">Welcome, Admin <font color=blue><?php echo $login_session; ?></font></h1> 
				   <form  method="post" action="logout.php">
                   <h1 align="center"><input  type="submit" name="submit" class="btn btn-primary" value="Logout">
				   </h1>
				   </form>
				   </div>
 				      <br>
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