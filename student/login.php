<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysqli server
	$link = mysqli_connect('localhost','root','');
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select database
	$db = mysqli_select_db($link,'model');
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		global $link;
		$str = @trim($str);
		$str = stripslashes($str);
		return mysqli_real_escape_string($link,$str);
	}
	
	//Sanitize the POST values
	$name = clean($_POST['name']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($name == '') {
		$errmsg_arr[] = 'name missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		header("location: index.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM student WHERE name='$name' AND password='$password'";
	$result=mysqli_query($link,$qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_STUDENT_ID'] = $member['student_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['last_name'];
			$_SESSION['SESS_PRO_PIC'] = $member['file'];
			
			session_write_close();
			header("location: home.php");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>