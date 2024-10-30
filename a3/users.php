<?php
session_start();

require_once('includes/db_connect.inc');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	function validateInput($str) {
   	 return trim($str);
	}

	function sanitizeFileName($str) {

    	$str = preg_replace('/[^a-zA-Z0-9_-]/', '', $str);
    	return substr($str, 0, 50);
	}

    $UserName = validateInput($_POST['UserName']);
	$Password = validateInput($_POST['Password']);
	$reg_date = validateInput($_POST['reg_date']);

	$sql = "SELECT * FROM users WHERE username = ?";
	$stmt = mysqli_prepare($connection, $sql);  
	mysqli_stmt_bind_param($stmt,"s",$UserName);    
	mysqli_stmt_execute($stmt);                  
	mysqli_stmt_store_result($stmt);
	$num_rows = mysqli_stmt_num_rows($stmt);
	
	if($num_rows > 0){
		$_SESSION['error'] =  'Username already exists!';
		header('location:register.php');
	}else{
		$password_hash = password_hash($Password,PASSWORD_BCRYPT);
		$sql = "INSERT INTO users (username,password,reg_date) VALUES(?,?,?)";
		$stmt = mysqli_prepare($connection,$sql);
		mysqli_stmt_bind_param($stmt,"sss",$UserName,$password_hash,$reg_date);
		mysqli_stmt_execute($stmt);
		$_SESSION['success'] =  'User register Succes!';
		header('location:register.php');
	}

}

	$connection->close();
?>