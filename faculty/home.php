<html>
<head>
<title>
FORBES COLLEGE :: STUDENT RECORD
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
<script src="../main/jeffartagame.js" type="text/javascript" charset="utf-8"></script>
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
<?php include('nav.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
    
			</li>
				
				</ul>             
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-table"></i> Students
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Students</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">

<a  href="1batche.php"><button class="btn btn-default btn-large" style="float: left;"><i class=""></i> First Batche</button></a>
<a  href="2batche.php"><button class="btn btn-default btn-large" style="float: left;"><i class=""></i> Second Batche</button></a>
<a  href="3batche.php"><button class="btn btn-default btn-large" style="float: left;"><i class=""></i> Third Batche</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM student ORDER BY id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			
		
				<div style="text-align:center;">
			Total Number of Students:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
			
			
</div>


<input type="text" style="height:35px; color:#222;" name="filter" value="" id="filter" placeholder="Search Students..." autocomplete="off" />

<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="15%"> Student ID</th>
			<th width="20%"> Full Name </th>
			<th width="10%"> Gender </th>
			<th width="10%"> Admittion Year </th>
			<th width="10%">  Job Position and Company Name </th>
			<th width="10%">  Phone Number </th>
			<th width="15%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM student ORDER BY id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				
			?>
		
<td><?php echo $row['student_id']; ?></td>
			<td><?php echo $row['name']; ?> <?php echo $row['last_name']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['yoa']; ?></td>
			<td><?php echo $row['report']; ?></td>
			<td><?php echo $row['parent']; ?></td>
			<td><a title="Click to view the Student" href="view.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success btn-mini"><i class="icon-search"></i> View</button> </a>
			
			</tr>
			<?php
				}
			?>
		
		
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

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