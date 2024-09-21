<html>
<head>
<title>
FORBES COLLEGE :: STUDENT RECORDS
</title>

<?php 
require_once('../main/auth.php');
?>
 <link href="../main/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../main/css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="../main/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="../main/css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="../main/js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="../main/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../main/lib/jquery.js" type="text/javascript"></script>
<script src="../main/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : '../main/src/loading.gif',
      closeImage   : '../main/src/closelabel.png'
    })
  })
</script>
</head>








<body>

	<div class="span10">
	<div class="contentheader">
			<i class="icon-table"></i> Students
			</div>
			<ul class="breadcrumb">
			<li><a href="home.php">Dashboard</a></li> /
			<li class="active">Students</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="home.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM student WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<center><h4><i class="icon-edit icon-large"></i> Student Information</h4></center>
<hr>
<center><img src="../uploads/<?php echo $row['file'];?>" class="roundimage2"  alt=""/>
<br><br>

<table>
<tr>
<td> Student ID. : </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #7d7d7d;"> <?php echo $row['student_id']; ?></td>
</tr>
<tr>
<td> Full Name :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #7d7d7d;"> <?php echo $row['name']; ?> <?php echo $row['last_name']; ?></td>
</tr>
<tr>
<td> Gender:  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #7d7d7d;"> <?php echo $row['gender']; ?></td>
</tr>
<tr>
<td> D.O.B:  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #7d7d7d;"> <?php echo $row['dob']; ?></td>
</tr>
<tr>
<td> Admission Year :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #7d7d7d;"> <?php echo $row['yoa']; ?></td>
</tr>
<tr>
<td> Phone Number:  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #7d7d7d;"> <?php echo $row['parent']; ?></td>
</tr>
<tr>
<td> Job Position and Company Name :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #7d7d7d;"> <?php echo $row['report']; ?></td>
</tr>


</table>
<br>
			
</center>

</div>
<?php
}
?>

<script src="../main/js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this Student? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletestudent.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('../main/footer.php');?>

</html>