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
		<div class="content">
			<div class="container">
				<div class="main">
					<h1 align="center">Search</h1>
					<hr>
					<h3 align=center>Search Student</h3>
                    <p align=center>Last name and First name only.</p>
                    <form align=center class="form-inline" method="post" action="student_search.php?go"  id="searchform">
                    <input type="textarea" name="name" class="form-control"> 
					<input  type="submit" name="submit" class="btn btn-primary" value="Search">
	                </form>
	                <br>
      <?php 
	  if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
	  $name=$_POST['name']; 
	  $db=mysql_connect  ("localhost", "root") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  $mydb=mysql_select_db("sdb"); 
	  $sql="SELECT * FROM student_info WHERE fname LIKE '%" . $name .  "%' OR lname LIKE '%" . $name ."%'"; 
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
      echo "<h4 class=media-heading><a href=student_info.php?id=$ID>"  .$FirstName . " " . $LastName . "</a></h4>";
	  echo "<h5 class=media-heading><b> ID Number:</b>  " . $ID . "</h5>";
	  echo "<h5 class=media-heading><b>Year and Section:</b>".$yearnsection ."</h5>";
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
	  }
	  }
	?>  <br>
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