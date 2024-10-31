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

	$sql = "SELECT password FROM users WHERE username = ?";
	$stmt = mysqli_prepare($connection, $sql);  
	mysqli_stmt_bind_param($stmt,"s",$UserName);    
	mysqli_stmt_execute($stmt);                  
	mysqli_stmt_store_result($stmt);
	$num_rows = mysqli_stmt_num_rows($stmt);
	
	if($num_rows == 0){
		$_SESSION['error'] =  'Username does not exists!';
		header('location:login.php');
	}else{

		mysqli_stmt_bind_result($stmt,$password_hash);
		mysqli_stmt_fetch($stmt);

		if(password_verify($Password,$password_hash)){
			$_SESSION['success'] =  'Login Successfull';
			$_SESSION["username"] = $UserName;
			header('location:index.php');
		}else{
			$_SESSION['error'] = 'invalid Password';
			header('location:login.php');
		}
	}

}

	$connection->close();
?>