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
<?php include('nav.php');
?>
<div class="container-fluid">
      <div class="row-fluid">
	



      
	<table align="center" border="1" width="100%">
<tr>
<th>Student-id</th>
<th>First-Name</th>
<th>Last-Name</th>
<th>Job Position and Company name</th>
<th>YOA</th>
<th>mobile Number</th>
<th>Password</th>
<th>Action</th>


</tr>
   <?php 
  $conn = mysqli_connect("localhost", "root", "","model");
   $query="SELECT * FROM student WHERE id=$_SESSION[SESS_MEMBER_ID] ";
   $result=mysqli_query($conn,$query);
   foreach($result as $row)
   {
echo "<tr>";
echo "<td>$row[student_id]";
echo "<td>$row[name]";
echo "<td>$row[last_name]";
echo "<td>$row[report]";
echo "<td>$row[yoa]";
echo "<td>$row[parent]";
echo "<td>" . md5($row['password']) . "</td>";
echo "<td><a href='edit.php?name=".$row['name']. "'>Edit</a></td>";


 }

?>

   
    <tr>
    
   
    </tr>
    
</table>		
	
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