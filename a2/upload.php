<?php
$title = "Pets Victoria";
include_once('includes/header.inc');
require_once('includes/db_connect.inc');
function cleanInput($str) {
  return trim($str);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $petData = [
    'name' => cleanInput($_POST['PetName']),
    'type' => cleanInput($_POST['PetType']),
    'description' => cleanInput($_POST['PetDescription']),
    'caption' => cleanInput($_POST['ImageCaption']),
    'age' => cleanInput($_POST['PetAge']),
    'location' => cleanInput($_POST['PetLocation']),
  ];

   $uploadError = validateImage($_FILES['PetImage']);

    if (empty($uploadError)) {
    $petData['image'] = uploadImage($petData['name'], $_FILES['PetImage']);
    insertPet($petData, $connection); // Function to insert data (explained later)
  }
}

$connection->close();

function validateImage($imageFile) {
  // Check for errors, allowed extensions, and size limit
  // (Similar logic as the original code, but encapsulated in a function)
  if ($imageFile['error'] !== 0) {
    return "Error uploading image: " . $imageFile['error'];
  } else {
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $imageExtension = pathinfo($imageFile['name'], PATHINFO_EXTENSION);
    if (!in_array($imageExtension, $allowedExtensions)) {
      return "Only JPG, JPEG and PNG images are allowed.";
    } else {
      $maxSize = 500000; // 500KB in bytes
      if ($imageFile['size'] > $maxSize) {
        return "Image size exceeds the limit of 500KB.";
      }
    }
  }
  return null; 
}

function uploadImage($petName, $imageFile) {
    $sanitizedName = sanitizeFileName($petName);
  $targetDir = "images/";
  $fileName = $sanitizedName . '.' . pathinfo($imageFile['name'], PATHINFO_EXTENSION);
  $targetFile = $targetDir . $fileName;
  $i = 1;
  while (file_exists($targetFile)) {
    $fileName = $sanitizedName . '-' . $i . '.' . pathinfo($imageFile['name'], PATHINFO_EXTENSION);
    $targetFile = $targetDir . $fileName;
    $i++;
  }
  if (move_uploaded_file($imageFile['tmp_name'], $targetFile)) {
    return $fileName; // Return the uploaded filename
  } else {
    return null;   }
}

function insertPet($petData, $connection) {
   $sql = "INSERT INTO pets (petname, type, description, image, caption, age, location) 
          VALUES (?, ?, ?, ?, ?, ?, ?)";

  $stmt = $connection->prepare($sql);
  $stmt->bind_param('sssssss', 
    $petData['name'], 
    $petData['type'], 
    $petData['description'], 
    $petData['image'], 
    $petData['caption'], 
    $petData['age'], 
    $petData['location']);

  if ($stmt->execute()) {
    } else {
  
  }
  $stmt->close();
}

?>