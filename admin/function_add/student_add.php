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
                    <li class="active"><a href="student_add.php"><span class="glyphicon glyphicon-plus">
					  </span> Add Student</a></li>
					<li><a href="../function_modify/student_delete.php"><span class="glyphicon glyphicon-edit">
					  </span> Modify Student List</a></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="login.html">
					  <img src="/gradingsystem/img/icon-user.png" class="img-circle" height=20px width=20px> Logged in as: <font color="green"><?php echo $login_session; ?></font></a></li>
            </ul>
                    </div>
		<div class="content">
			<div class="container">
				<div class="main">
					<h1 align="center">Add Information</h1>
					<hr> 
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
					<div class="well" style="align:center">
                    <form data-toggle="validator" role="form" class="form-inline" name="frmImage" enctype="multipart/form-data" action="save_add.php" method="post" class="frmImageUpload" >
                    <p>Upload Image File:</p>
					<div class="form-group">
				    <img src="slcupload.jpg" class="img-circle" height="100px" width="100px" id="image" />
					<p> 100px</p>
					</div>
					<div class="form-group">
					<img src="slcupload.jpg" class="img-circle" height="50px" width="50px" id="image2" />
					<p> 50px</p>
					</div>
                    <p align="center"><input name="userImage" type="file" id="img" class="inputFile"/></p>				
                    <br>				
                    <div class="form-group">					
                    <p align="center">Student ID: <input class="form-control" type="text" name="id" maxlength="9" required></p>
                    <p align="center"> First Name: <input class="form-control"  type="text" name="fname" required></p>
                    <p align="center">  Last Name: <input class="form-control" type="text"name="lname" required></p>
                    <p align="center"> Age:
					<select class="form-control" name="age" required>
                    <option value="11">11</option> 
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
					<option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
					<option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
					<option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
					<option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
					<option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">44</option>
                    </select>
					</p>
				    <p align="center">Gender: <select class="form-control" name="gender" required>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                   </select></p>
                   <p align="center">Year: <select class="form-control" id="year" name="year" required>
                   <option selected="selected" >Year</option>
                   <option>Grade 7</option>
                   <option>Grade 8</option>
                   <option>Grade 9</option>
                   <option>Grade 10</option>
                   </select>
				   </p>
                   <p align="center">Section: <select class="form-control" id="section" name="yearnsection" required>
				   <option selected="selected" >Section</option>
				   </select>
					</p>
					<br>
<p align="center"><input data-toggle="modal" data-target="#savesuccessmodal" type=button name=edit class="btn-lg btn-primary" value="Add Student"></p>
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
	  <input type="submit" name="submit" class="btn btn-primary" value="Ok">
		</form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
					</div>
					</div>
					<br>
					<br>
                </form>
				</div>
				</div>
				</div>
				<div class="col-sm-4"></div>
 				      <br>
					<hr>
				</div>
			</div>
		</div>
		</div>
		<div class="footer">
	    <div class="container">
			</div>
		</div>
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
<script>
jQuery(function($) {
    var section = {
        'Grade 7': ['7-Banana', '7-Apple', '7-Orange', '7-Grapes', '7-Mango'],
        'Grade 8': ['8-Guamamela', '8-Santan', '8-Sunflower', '8-Orchids', '8-Anthurium'],
        'Grade 9': ['9-Zircon', '9-Gold', '9-Diamond', '9-Ruby', '9-Emerald'],
        'Grade 10': ['10-Garcia','10-Magsaysay','10-Marcos','10-Aguinaldo','10-Laurel'],
    }
    
    var $section = $('#section');
    $('#year').change(function () {
        var year = $(this).val(), lcns = section[year] || [];
        
        var html = $.map(lcns, function(lcn){
            return '<option value="' + lcn + '">' + lcn + '</option>'
        }).join('');
        $section.html(html)
    });
});
</script>
	</body>
</html>