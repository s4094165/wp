<?php
session_start();
require_once('includes/db_connect.inc');
?>

<?php

function validateInput($str) {
    return trim($str);
}

function sanitizeFileName($str) {

    $str = preg_replace('/[^a-zA-Z0-9_-]/', '', $str);

    return substr($str, 0, 50);
}

if (isset($_GET['petid'])) {
  $petid = mysqli_real_escape_string($connection, $_GET['petid']); 

    $petName = validateInput($_POST['petName']);
    $petType = validateInput($_POST['petType']);
    $petDescription = validateInput($_POST['petDescription']);
    $petImage = $_FILES['petImage'];
    $imageCaption = validateInput($_POST['petCaption']);
    $petAge = validateInput($_POST['petAge']);
    $petLocation = validateInput($_POST['petLocation']);
    $username = $_SESSION["username"];

              $sql = "SELECT * FROM pets WHERE petid = ?";
              $stmt = mysqli_prepare($connection, $sql);  
              mysqli_stmt_bind_param($stmt, "i", $petid);    
              mysqli_stmt_execute($stmt);                  
              $result = mysqli_stmt_get_result($stmt); 
              $row = mysqli_fetch_assoc($result);

    if($_FILES["petImage"]["name"])
        {
           if ($petImage['error'] !== 0) {
            $uploadError = "Error uploading image: " . $petImage['error'];
            $_SESSION['error'] = $uploadError;
            header('location:edit.php?petid='.$petid);
        } else {

        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = pathinfo($petImage['name'], PATHINFO_EXTENSION);
        if (!in_array($imageExtension, $allowedExtensions)) {
            $uploadError = "Only JPG, JPEG and PNG images are allowed.";
            $_SESSION['error'] = $uploadError;
            header('location:edit.php?petid='.$petid);
        } else {

            $maxSize = 500000; 
            if ($petImage['size'] > $maxSize) {
                $uploadError = "Image size exceeds the limit of 500KB.";
                $_SESSION['error'] = $uploadError;
                header('location:edit.php?petid='.$petid);

            } else {

                $sanitizedPetName = sanitizeFileName($petName);

                $targetDir = "images/";
                $fileName = $sanitizedPetName . '.' . $imageExtension;
                $targetFile = $targetDir . $fileName;
                $i = 1;
                
                while (file_exists($targetFile)) {
                    $fileName = $sanitizedPetName . '-' . $i . '.' . $imageExtension;
                    $targetFile = $targetDir . $fileName;
                    $i++;
                }

                if (move_uploaded_file($petImage['tmp_name'], $targetFile)) {
                    unlink("images/".$row['image']);
                } else {
                    $uploadError = "Failed to upload image.";
                    $_SESSION['error'] = $uploadError;
                    header('location:edit.php?petid='.$petid);
                }
            }
        } 
    }
        }else{
              
              $fileName = htmlspecialchars($row['image']);
        }

        if (empty($uploadError)) {
            $sql = "UPDATE pets SET petname = ?, type = ?, description = ?, image = ?, caption = ?, age = ?, location = ? WHERE petid = ? ";
            $stmt = $connection->prepare($sql);

        mysqli_stmt_bind_param($stmt,'sssssssi', $petName, $petType, $petDescription, $fileName, $imageCaption, $petAge, $petLocation,$petid);

        if ($stmt->execute()) {
        $_SESSION['success'] = "Successfully Edit the pet :)";
        header('location:edit.php?petid='.$petid);
        } else {
            $_SESSION['error'] = "Error adding pet: " . $connection->error;
            header('location:edit.php?petid='.$petid);
        }
        $stmt->close();
    }

}
$connection->close();