<?php

$title = "Pets Victoria";

include_once('includes/header.inc');

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $petName = validateInput($_POST['petName']);
    $petType = validateInput($_POST['petType']);
    $petDescription = validateInput($_POST['petDescription']);
    $petImage = $_FILES['petImage'];
    $imageCaption = validateInput($_POST['petCaption']);
    $petAge = validateInput($_POST['petAge']);
    $petLocation = validateInput($_POST['petLocation']);
    $username = $_SESSION["username"];

    if ($petImage['error'] !== 0) {
        $uploadError = "Error uploading image: " . $petImage['error'];
        $_SESSION['error'] = $uploadError;
        header('location:add.php');
    } else {

        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = pathinfo($petImage['name'], PATHINFO_EXTENSION);
        if (!in_array($imageExtension, $allowedExtensions)) {
            $uploadError = "Only JPG, JPEG and PNG images are allowed.";
            $_SESSION['error'] = $uploadError;
            header('location:add.php');
        } else {

            $maxSize = 500000; 
            if ($petImage['size'] > $maxSize) {
                $uploadError = "Image size exceeds the limit of 500KB.";
                $_SESSION['error'] = $uploadError;
                header('location:add.php');

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

                } else {
                    $uploadError = "Failed to upload image.";
                    $_SESSION['error'] = $uploadError;
                    header('location:add.php');
                }
            }
        }
    }

    if (empty($uploadError)) {
        $sql = "INSERT INTO pets (petname, type, description, image, caption, age, location,username) 
                VALUES (?, ?, ?, ?, ?, ?, ?,?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ssssssss', $petName, $petType, $petDescription, $fileName, $imageCaption, $petAge, $petLocation,$username);

        if ($stmt->execute()) {
        $_SESSION['success'] = "Successfully added the pet :)";
        header('location:add.php');
        } else {
            $_SESSION['error'] = "Error adding pet: " . $connection->error;
            header('location:add.php');
        }
        $stmt->close();
    }
}

$connection->close();

?>