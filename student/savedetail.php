<?php
// configuration
include('../connect.php');

// new data
$id =strip_tags( $_POST['memi']); // Assuming 'memi' is the id of the student to be updated
$a = strip_tags($_POST['name']);
$h = strip_tags($_POST['last_name']);
$b = strip_tags($_POST['report']);
$c = strip_tags($_POST['yoa']);
$d = strip_tags($_POST['parent']);
$e = strip_tags($_POST['dob']);
$f = strip_tags($_POST['student_id']);
$g = strip_tags($_POST['gender']);
$j = strip_tags($_POST['password']);

// query
$sql = "UPDATE student 
        SET name=?, last_name=?, report=?, yoa=?, parent=?, dob=?, student_id=?, gender=?, password=?
        WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a, $h, $b, $c, $d, $e, $f, $g, $j, $id)); // Add $id as the last parameter

// Redirect after the update
header("Location: home.php");
?>
