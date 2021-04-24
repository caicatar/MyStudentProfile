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
					  <img src="/gradingsystem/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
			<div class="container">
				<div class="main">
					<h1 align="center">Modify Information</h1>
					<hr>
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
					<div class="well" style="align:center">
<?php
include('../config.php');
   $ID = $_GET['id'];
   $query="select * from student_info where id=$ID";
   $result=mysql_query($query);
   $count=mysql_num_rows($result);
if ($count>=1)
{
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
?>
<form class="form-inline" name="frmImage" enctype="multipart/form-data" action="modify_save.php?id=<?php echo $ID; ?>" method="post" class="frmImageUpload">
<p>Upload Image File:</p>
<div class="form-group">
<img src=getImage.php?id=<?php echo $ID; ?> class="img-circle" height="100px" width="100px" id="image" />
<p> 100px</p>
</div>
<div class="form-group">
<img src=getImage.php?id=<?php echo $ID; ?> class="img-circle" height="50px" width="50px" id="image2" />
<p> 50px</p>
</div>
<br>
<button type="button" class="btn btn-info btn-primary" data-toggle="modal" data-target="#imagemodal">Upload new Image</button>
<script>
                    document.getElementById("img").onchange = function () {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                    document.getElementById("image").src = e.target.result;
					document.getElementById("image2").src = e.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                    };                 
</script>			
<br>	
<br>
<div class="form-group">
<p align="center"> ID:<input class="form-control" type=text name=id maxlength="9" value=<?php echo $row['id'];?>></p>
<p align="center">First Name:<input class="form-control" type=text name=fname value=<?php echo $row['fname'];?>></p>
<p align="center">Last Name:<input class=form-control type=text name=lname value=<?php echo $row['lname'];?>></p>
<p align="center">Gender: <select class=form-control name=gender value=<?php echo $row['gender'];?>>
<option value=Male>Male</option>
<option value=Female>Female</option>
</select>
</p>
<p align="center">Age: <input class=form-control type=text name=age maxlength="2" value=<?php echo $row['age'];?>></p>
<p align="center">Year and Section: <select class=form-control name=yearnsection value=<?php echo $row['yearnsection']; ?>>
<option selected="selected"><?php echo $row['yearnsection']; ?></option>
<option value="7-Apple">7-Apple</option>
<option value="7-Orange">7-Orange</option>
<option value="7-Grapes">7-Grapes</option>
<option value="7-Mango">7-Mango</option>
<option value="7-Banana">7-Banana</option>
<option value="8-Guamamela">8-Guamamela</option>
<option value="8-Santan">8-Santan</option>
<option value="8-Sunflower">8-Sunflower</option>
<option value="8-Orchids">8-Orchids</option>
<option value="8-Anthurium">8-Anthurium</option>
<option value="9-Zircon">9-Zircon</option>
<option value="9-Gold">9-Gold</option>
<option value="9-Diamond">9-Diamond</option>
<option value="9-Ruby">9-Ruby</option>
<option value="9-Emerald">9-Emerald</option>
<option value="10-Garcia">10-Garcia</option>
<option value="10-Magsaysay">10-Magsaysay</option>
<option value="10-Marcos">10-Marcos</option>
<option value="10-Aguinaldo">10-Aguinaldo</option>
<option value="10-Laurel">10-Laurel</option>

</select>
</p>

</div>
<br>
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
		</form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
</form>
<form action="student_delete.php" method="post">
<p align="center"><input type=submit name=cancel class="btn-lg btn-primary" value=Cancel></p>
</form>
<form action="../function_grading/student_grade.php?id=<?php echo $ID; ?>" method="post">
<p align="center"><input type="submit" class="btn-lg btn-primary" value="Grade Student"></p>
</form>


<div id="imagemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload new Image?</h4>
      </div>
      <div class="modal-body">
                    <form class="form-inline" name="frmImage" enctype="multipart/form-data" action="upload.php?id=<?php echo $ID; ?>" method="post" class="frmImageUpload" >
                    <p>Upload Image File:</p>
					<div class="form-group">
				    <img src=getImage.php?id=<?php echo $ID; ?> class="img-circle" height="100px" width="100px" id="image0" />
					<p> 100px</p>
					</div>
					<div class="form-group">
					<<img src=getImage.php?id=<?php echo $ID; ?> class="img-circle" height="50px" width="50px" id="image01" />
					<p> 50px</p>
					</div>
					<input name="userImage" type="file" id="img1" class="inputFile" required/>
					<br>
					<script>
                    document.getElementById("img1").onchange = function () {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                    document.getElementById("image0").src = e.target.result;
					document.getElementById("image01").src = e.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                    };                 
                    </script>
      </div>
      <div class="modal-footer">
	    <input type=submit name=upload class="btn btn-primary" value=Upload>
		</form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
	</div>
	</div>
	
</form>
<div class="alert alert-success">
  <strong><span class="glyphicon glyphicon-ok"></span> Success!</strong> Modify successful!
</div>
				</div>

  </div>
</div>

</div>
</div>
</div>
<?php
}
}
?>
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