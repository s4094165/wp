<?php
session_start();

require_once('includes/db_connect.inc');

if (isset($_GET['petid'])) {
  $petid = mysqli_real_escape_string($connection, $_GET['petid']); 

  $sql = "SELECT * FROM pets WHERE petid = ?";
  $stmt = mysqli_prepare($connection, $sql);  
  mysqli_stmt_bind_param($stmt, "i", $petid);    
  mysqli_stmt_execute($stmt);                  
  $result = mysqli_stmt_get_result($stmt);     
  $row = mysqli_fetch_assoc($result);
  $image = htmlspecialchars($row['image']); 
  $imagePath = "images/" . $image;

  unlink($imagePath);

  $delete = "DELETE FROM pets WHERE petid = ?";
  $stmts = mysqli_prepare($connection, $delete);
  mysqli_stmt_bind_param($stmts, "i", $petid);    
  mysqli_stmt_execute($stmts); 
  $_SESSION['success'] = 'Pets deleted successfull.!'; 
  header('location:user.php?username='.$_SESSION['username']);
  mysqli_stmt_close($stmts);

}
mysqli_close($connection);
?>