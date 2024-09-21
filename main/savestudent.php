<?php
session_start();
include('../connect.php');
$a = strip_tags($_POST['name']);
$k = strip_tags($_POST['last_name']);
$b = strip_tags($_POST['report']);
$c = strip_tags($_POST['yoa']);
$d = strip_tags($_POST['parent']);
$e = strip_tags($_POST['dob']);
$f = strip_tags($_POST['student_id']);
$g = strip_tags($_POST['gender']);
$j = strip_tags($_POST['password']);

// query

$file_name  = strtolower($_FILES['file']['name']);
$file_ext = substr($file_name, strrpos($file_name, '.'));
$prefix = 'your_site_name_'.md5(time()*rand(1, 9999));
$file_name_new = $prefix.$file_ext;
$path = '../uploads/'.$file_name_new;


    /* check if the file uploaded successfully */
    if(@move_uploaded_file($_FILES['file']['tmp_name'], $path)) {

  //do your write to the database filename and other details   
$sql = "INSERT INTO student (name,last_name,report,yoa,parent,dob,student_id,gender,file,password) VALUES (:a,:k,:b,:c,:d,:e,:f,:g,:h,:j)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':k'=>$k,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$file_name_new, ':j'=>$j));
header("location: students.php");

	}
?>